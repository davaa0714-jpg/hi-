<?php
include("../app/db/users.php");



// Статистик мэдээлэл
$total_news = count(selectAll('post'));
$total_standards = count(selectAll('standards'));
$total_projects = count(selectAll('standard_projects'));
$total_users = count(selectAll('user'));

// Сүүлийн мэдээ
$recent_news = selectAll(" post ORDER BY date DESC");

// Сүүлийн стандартууд
$recent_standards = selectAll('standards' . " ORDER BY id DESC LIMIT 5");

// Системийн мэдээлэл
$server_usage = round(memory_get_usage(true) / 1024 / 1024, 2); // MB
$db_status = true; // Database холболт амжилттай гэж үзье

if(!isset($_SESSION['username'])){
    header("Location: ../login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
    <title>Админ | Хянах самбар</title>
    <style>
        /* Статистик картууд */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            border-left: 4px solid #007bff;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card.news { border-left-color: #28a745; }
        .stat-card.standards { border-left-color: #ffc107; }
        .stat-card.projects { border-left-color: #dc3545; }
        .stat-card.users { border-left-color: #6f42c1; }
        
        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9em;
        }
        
        /* Үйл ажиллагааны хэсэг */
        .activities-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .activity-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .activity-card h3 {
            margin-bottom: 15px;
            color: #333;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .activity-list {
            list-style: none;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .activity-item {
            padding: 12px 0;
            border-bottom: 1px solid #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-title {
            flex-grow: 1;
            font-weight: 500;
            font-size: 0.9em;
        }
        
        .activity-date {
            color: #888;
            font-size: 0.8em;
            white-space: nowrap;
        }
        
        /* Түргэн хандалт */
        .quick-actions {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .quick-actions h3 {
            margin-bottom: 20px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        
        .action-btn {
            background: #007bff;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,123,255,0.3);
        }
        
        .action-btn.news { background: #28a745; }
        .action-btn.news:hover { background: #218838; }
        
        .action-btn.standard { background: #ffc107; color: #000; }
        .action-btn.standard:hover { background: #e0a800; }
        
        .action-btn.project { background: #dc3545; }
        .action-btn.project:hover { background: #c82333; }
        
        .action-btn.commission { background: #6f42c1; }
        .action-btn.commission:hover { background: #5a359c; }
        
        /* Системийн статус */
        .system-status {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .system-status h3 {
            margin-bottom: 20px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .status-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
        
        .status-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 8px;
            background: #f8f9fa;
        }
        
        .status-item.online .fa-circle { color: #28a745; }
        .status-item.warning .fa-circle { color: #ffc107; }
        .status-item.offline .fa-circle { color: #dc3545; }
        
        .status-badge {
            margin-left: auto;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 500;
        }
        
        .status-item.online .status-badge { background: #d4edda; color: #155724; }
        .status-item.warning .status-badge { background: #fff3cd; color: #856404; }
        .status-item.offline .status-badge { background: #f8d7da; color: #721c24; }
        
        /* Хэрэглэгчийн мэдээлэл */
        .user-info-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .user-info-card h3 {
            margin-bottom: 20px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-details {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-avatar {
            color: #007bff;
        }
        
        .user-data p {
            margin: 8px 0;
            font-size: 0.95em;
        }
        
        /* Responsive дизайн */
        @media (max-width: 768px) {
            .activities-section {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-buttons {
                grid-template-columns: 1fr;
            }
            
            .status-items {
                grid-template-columns: 1fr;
            }
            
            .user-details {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <section id="header">
        <div class="header container">
            <nav class="navbar">
                <div class="nav-1">
                    <a href="index.html"><img src="../images/hot_goldoo_tsagaan_rounded.png" class="logo"></a>
                </div>
                <ul class="nav-list">
                    <li>
                        <a href="#"><i class="fa-solid fa-circle-user"></i></a>
                        <?php if(isset($_SESSION['id'])): ?>
                            <ul class="user-op">
                                <p class="name"><?php echo $_SESSION['username']; ?></p>
                                <li><a href="<?php echo '../login' ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
                            </ul>
                        <?php endif?>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <section class="wrapper">
        <div class="sidebar">
         <ul>
                <a href="dashboard.php"><li>Хянах самбар</li></a>
                <a href="news-admin"><li>Мэдээ</li></a>
                <a href="standard-admin"><li>Стандарт</li></a>
                <a href="commission-admin"><li>Комиссын хуваарь</li></a>
                <a href="contact-admin.php"><li>Холбоо барих</li></a>
                <a href="aboutus-admin"><li>Бидний тухай</li></a>
             
        </ul>
        </div>
        <div class="content">
            <div class="content-wrapper">
                <!-- Статистик картууд -->
            <div class="stats-container">
                <a href="news-admin.php" class="stat-card-link">
                    <div class="stat-card news">
                        <i class="fa-solid fa-newspaper fa-2x"></i>
                        <div class="stat-number"><?php echo $total_news; ?></div>
                        <div class="stat-label">Нийт мэдээ</div>
                    </div>
                </a>
                
                <a href="standard-admin.php" class="stat-card-link">
                    <div class="stat-card standards">
                        <i class="fa-solid fa-file-contract fa-2x"></i>
                        <div class="stat-number"><?php echo $total_standards; ?></div>
                        <div class="stat-label">Батлагдсан стандарт</div>
                    </div>
                </a>
                
                <a href="standard-admin.php" class="stat-card-link">
                    <div class="stat-card projects">
                        <i class="fa-solid fa-file-pen fa-2x"></i>
                        <div class="stat-number"><?php echo $total_projects; ?></div>
                        <div class="stat-label">Стандартын төсөл</div>
                    </div>
                </a>
                
            <a href="hereglegch.php" class="stat-card-link">
                <div class="stat-card users">
                    <i class="fa-solid fa-users fa-2x"></i>
                    <div class="stat-number"><?php echo $total_users; ?></div>
                    <div class="stat-label">Хэрэглэгчид</div>
                </div>
            </a>
        </div>
                <!-- Түргэн хандалтын товчнууд -->
                <div class="quick-actions">
                    <h3><i class="fa-solid fa-bolt"></i> Түргэн хандалт</h3>
                    <div class="action-buttons">
                        <a href="news-admin" class="action-btn news">
                            <i class="fa-solid fa-plus"></i> Шинэ мэдээ нэмэх
                        </a>
                        <a href="standard-admin" class="action-btn standard">
                            <i class="fa-solid fa-file-contract"></i> Стандарт нэмэх
                        </a>
                        <a href="standard-admin" class="action-btn project">
                            <i class="fa-solid fa-file-pen"></i> Төсөл нэмэх
                        </a>
                        <a href="commission-admin" class="action-btn commission">
                            <i class="fa-solid fa-calendar-plus"></i> Хуваарь нэмэх
                        </a>
                    </div>
                </div>
                
                <!-- Сүүлийн үйл ажиллагаа -->
                <div class="activities-section">
                    <div class="activity-card">
                        <h3><i class="fa-solid fa-clock-rotate-left"></i> Сүүлийн мэдээ</h3>
                        <ul class="activity-list">
                            <?php if(!empty($recent_news)): ?>
                                <?php foreach($recent_news as $news): ?>
                                    <li class="activity-item">
                                        <span class="activity-title"><?php echo htmlspecialchars(substr($news['title'], 0, 50)); ?><?php echo strlen($news['title']) > 50 ? '...' : ''; ?></span>
                                        <span class="activity-date"><?php echo date('m-d', strtotime($news['date'])); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="activity-item">
                                    <span class="activity-title">Мэдээ байхгүй байна</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="activity-card">
                        <h3><i class="fa-solid fa-list-check"></i> Сүүлийн стандартууд</h3>
                        <ul class="activity-list">
                            <?php if(!empty($recent_standards)): ?>
                                <?php foreach($recent_standards as $standard): ?>
                                    <li class="activity-item">
                                        <span class="activity-title"><?php echo htmlspecialchars($standard['code']); ?> - <?php echo htmlspecialchars(substr($standard['name'], 0, 40)); ?><?php echo strlen($standard['name']) > 40 ? '...' : ''; ?></span>
                                        <span class="activity-date">ID: <?php echo $standard['id']; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="activity-item">
                                    <span class="activity-title">Стандарт байхгүй байна</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Хэрэглэгчийн мэдээлэл -->
                <div class="user-info-card">
                    <h3><i class="fa-solid fa-user-shield"></i> Хэрэглэгчийн мэдээлэл</h3>
                    <div class="user-details">
                        <div class="user-avatar">
                            <i class="fa-solid fa-user-circle fa-3x"></i>
                        </div>
                        <div class="user-data">
                            <p><strong>Нэр:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            <p><strong>Эрх:</strong> <span style="color: #dc3545; font-weight: bold;"><?php echo htmlspecialchars($_SESSION['role']); ?></span></p>
                            <p><strong>Нэвтрэсэн:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Системийн статус -->
                <div class="system-status">
                    <h3><i class="fa-solid fa-server"></i> Системийн статус</h3>
                    <div class="status-items">
                        <div class="status-item online">
                            <i class="fa-solid fa-circle"></i>
                            <span>Database холболт</span>
                            <span class="status-badge">Актив</span>
                        </div>
                        <div class="status-item online">
                            <i class="fa-solid fa-circle"></i>
                            <span>Файл систем</span>
                            <span class="status-badge">Хэвийн</span>
                        </div>
                        <div class="status-item <?php echo $server_usage > 50 ? 'warning' : 'online'; ?>">
                            <i class="fa-solid fa-circle"></i>
                            <span>Серверийн ачаалал</span>
                            <span class="status-badge"><?php echo $server_usage; ?> MB</span>
                        </div>
                        <div class="status-item warning">
                            <i class="fa-solid fa-circle"></i>
                            <span>Backup</span>
                            <span class="status-badge">Хэрэгтэй</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            // Картуудын hover эффект
            $('.stat-card, .action-btn').hover(
                function() {
                    $(this).css('transform', 'translateY(-5px)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                }
            );
            
            // Activity list scroll байдал
            $('.activity-list').hover(
                function() {
                    $(this).css('overflow-y', 'auto');
                },
                function() {
                    $(this).css('overflow-y', 'hidden');
                }
            );
            
            // Welcome message animation
            $('.welcome-text').hide().fadeIn(1000);
        });
    </script>
</body>
</html>