<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>4eachblog 掲示板</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <?php
        
        mb_internal_encoding("utf8");
        $pdo = new PDO("mysql:dbname=ShoKato;host=localhost;","root","root");
        $stmt = $pdo->query("select * from 4each_keijiban");
        
        ?>

        
        <header>
            <img src="4eachblog_logo.jpg" class="logo">
            <div class="header_menu">
                <ul>
                    <li>トップ</li>
                    <li>プロフィール</li>
                    <li>4eachについて</li>
                    <li>登録フォーム</li>
                    <li>問い合わせ</li>
                    <li>その他</li>
                </ul>
            </div>
        </header>
        
        <main>
            <div class="main_con">
                <h1>プログラミングに役立つ掲示板</h1>
                <div class="box_form">
                    <h2>入力フォーム</h2>
                    <form method="post" action="insert.php">
                        <div>
                            <label>ハンドルネーム</label><br>
                            <input type="text" class="text" name="handlename" size="50">
                        </div>
                        <div>
                            <label>タイトル</label><br>
                            <input type="text" class="text" name="title" size="50">
                        </div>
                        <div>
                            <label>コメント</label><br>
                            <textarea class="textarea" name="comments" rows="5" cols="80">
                            </textarea>
                        </div>
                        <div>
                            <input type="submit" class="submit" name="submit" value="送信する" size=20 action="insert.php">
                        </div>
                    </form>
                </div>
                
                <?php
                    while($row=$stmt->fetch()){
                        echo"<div class='box_thread'>";
                            echo"<h3>".$row['title']."</h3>";
                            echo"<div class ='thread_con'>";
                                echo $row['comments'];
                            echo"</div>";
                        echo"<div class='thread_name'>
                            posted by".$row['handlename']."</div>";
                        echo"</div>";
                    }
                ?>
            </div>
            
            <div class="sidebar">
                <h2>人気の記事</h2>
                    <ul>
                        <li>PHPオススメ本</li>
                        <li>PHP MyAdminの使い方</li>
                        <li>いま人気のエディタTop5</li>
                        <li>HTMLの基礎</li>
                    </ul>
                <h2>オススメリンク</h2>
                    <ul>
                        <li>インターノウス株式会社</li>
                        <li>XAMPPのダウンロード</li>
                        <li>Eclipseのダウンロード</li>
                        <li>Bracketsのダウンロード</li>
                    </ul>
                <h2>カテゴリ</h2>
                    <ul>
                        <li>HTML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                    </ul>
            </div>
        </main>
        
        <footer>
            <p>copyright internous | 4each blog is the one which provies A to Z about programming</p>
        </footer>
    </body>
</html>