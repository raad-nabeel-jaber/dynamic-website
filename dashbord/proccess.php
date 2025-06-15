<?php
// Disable output buffering
ob_end_clean();

// Set appropriate JSON headers
header("Content-Type: application/json; charset=utf-8");
header("Cache-Control: no-cache, must-revalidate");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Set to 0 to prevent PHP errors from breaking JSON

// Define allowed tables (add new table names here as needed)
$allowedTables = ['HAF', 'slid', 'newest', 'about', 'about2' , 'blog', 'contact', 'msg', 'post', 'comment'];

// Set the default table to "HAF"
$table = 'HAF';
if (isset($_GET['table']) && in_array($_GET['table'], $allowedTables)) {
    $table = $_GET['table'];
}

// Create a database connection
$mysqli = new mysqli("localhost", "root", "", "task26");
if ($mysqli->connect_error) {
    echo json_encode(["error" => "Database connection failed: " . $mysqli->connect_error]);
    exit;
}

if($table === "HAF"){
    if($_POST['action'] == 'getData'){
        $id = 1;
        $result = $mysqli->query("SELECT * FROM `haf` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $haf = $result->fetch_assoc();
            echo json_encode($haf, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
        $title     = $mysqli->real_escape_string($_POST['title']);
        $facebook    = $mysqli->real_escape_string($_POST['facebook']);
        $twitter = $mysqli->real_escape_string($_POST['twitter']);
        $instagram = $mysqli->real_escape_string($_POST['instagram']);
    
        $query = "UPDATE `haf` SET 
        `title`='$title',
        `facebook`='$facebook',
        `twitter`='$twitter',
        `instagram`='$instagram'
        WHERE `id` = 1";
            if ($mysqli->query($query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["error" => "Update failed: " . $mysqli->error]);
            }
            exit;
        }
}elseif ($table === "slid"){
    if (isset($_POST['add'])) {
        $imageUpload = $mysqli->real_escape_string($_POST['imageUpload']);
        $blogTitle  = $mysqli->real_escape_string($_POST['blogTitle']);
        $bloggerName = $mysqli->real_escape_string($_POST['bloggerName']);
        $subTitle = $mysqli->real_escape_string($_POST['subTitle']);
        $publishDate = $mysqli->real_escape_string($_POST['publishDate']);
        $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);

        $query = "INSERT INTO `slid` (`imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) 
                        VALUES ('$imageUpload', '$blogTitle', '$bloggerName','$subTitle', '$publishDate', '$commentsCount')";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Insertion failed: " . $mysqli->error]);
        }
        exit;
    }
    if (isset($_POST['edit_id'])) {
        $id = intval($_POST['edit_id']);
        $result = $mysqli->query("SELECT * FROM `slid` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode($user, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }
            // 3. Update user data
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
                $id = intval($_POST['id']);  
                $blogTitle     = $mysqli->real_escape_string($_POST['blogTitle']);
                $bloggerName   = $mysqli->real_escape_string($_POST['bloggerName']);
                $subTitle      = $mysqli->real_escape_string($_POST['subTitle']);
                $publishDate   = $mysqli->real_escape_string($_POST['publishDate']);
                $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);
            
                $query = "UPDATE `slid` SET 
                            `blogTitle`='$blogTitle',
                            `bloggerName`='$bloggerName',
                            `subTitle`='$subTitle',
                            `publishDate`='$publishDate',
                            `commentsCount`='$commentsCount'
                            WHERE `id` = '$id'";
            
                if ($mysqli->query($query)) {
                    echo json_encode(["success" => true]);
                } else {
                    echo json_encode(["error" => "Update failed: " . $mysqli->error]);
                }
                exit;
            }
            // 4. Delete a user
    if (isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);
        $query = "DELETE FROM `slid` WHERE `id` = '$id'";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Deletion failed: " . $mysqli->error]);
        }
        exit;
    }
    try {
        $result = $mysqli->query("SELECT * FROM `slid`");
        $snake = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($snake, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(["error" => "Error: " . $e->getMessage()]);
    }
    exit;
}elseif ($table === "newest"){
    if (isset($_POST['add'])) {
        $imageUpload = $mysqli->real_escape_string($_POST['imageUpload']);
        $blogTitle  = $mysqli->real_escape_string($_POST['blogTitle']);
        $bloggerName = $mysqli->real_escape_string($_POST['bloggerName']);
        $subTitle = $mysqli->real_escape_string($_POST['subTitle']);
        $publishDate = $mysqli->real_escape_string($_POST['publishDate']);
        $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);

        $query = "INSERT INTO `newest` (`imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) 
                        VALUES ('$imageUpload', '$blogTitle', '$bloggerName','$subTitle', '$publishDate', '$commentsCount')";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Insertion failed: " . $mysqli->error]);
        }
        exit;
    }
    if (isset($_POST['edit_id'])) {
        $id = intval($_POST['edit_id']);
        $result = $mysqli->query("SELECT * FROM `newest` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode($user, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }
            // 3. Update user data
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
                $id = intval($_POST['id']);  
                $blogTitle     = $mysqli->real_escape_string($_POST['blogTitle']);
                $bloggerName   = $mysqli->real_escape_string($_POST['bloggerName']);
                $subTitle      = $mysqli->real_escape_string($_POST['subTitle']);
                $publishDate   = $mysqli->real_escape_string($_POST['publishDate']);
                $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);
            
                $query = "UPDATE `newest` SET 
                            `blogTitle`='$blogTitle',
                            `bloggerName`='$bloggerName',
                            `subTitle`='$subTitle',
                            `publishDate`='$publishDate',
                            `commentsCount`='$commentsCount'
                            WHERE `id` = '$id'";
            
                if ($mysqli->query($query)) {
                    echo json_encode(["success" => true]);
                } else {
                    echo json_encode(["error" => "Update failed: " . $mysqli->error]);
                }
                exit;
            }
            // 4. Delete a user
    if (isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);
        $query = "DELETE FROM `newest` WHERE `id` = '$id'";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Deletion failed: " . $mysqli->error]);
        }
        exit;
    }
    try {
        $result = $mysqli->query("SELECT * FROM `newest`");
        $snake = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($snake, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(["error" => "Error: " . $e->getMessage()]);
    }
    exit;
}else if($table === "about"){
    if($_POST['action'] == 'getData'){
        $id = 1;
        $result = $mysqli->query("SELECT * FROM `about` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $haf = $result->fetch_assoc();
            echo json_encode($haf, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
        $id = 1;
        $image = $mysqli->real_escape_string($_POST['image']);
    
        $query = "UPDATE `about` SET 
        `image`='$image'
        WHERE `id` = '$id'";
            if ($mysqli->query($query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["error" => "Update failed: " . $mysqli->error]);
            }
            exit;
        }
}else if($table === "about2"){
    if($_POST['action'] == 'getData'){
        $id = $_POST['id'];
        $result = $mysqli->query("SELECT * FROM `about_items` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $haf = $result->fetch_assoc();
            echo json_encode($haf, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
        $id = $_POST['id'];
        $title     = $mysqli->real_escape_string($_POST['title']);
        $content    = $mysqli->real_escape_string($_POST['content']);
    
        $query = "UPDATE `about_items` SET 
        `title`='$title',
        `content`='$content'
        WHERE `id` = '$id'";
            if ($mysqli->query($query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["error" => "Update failed: " . $mysqli->error]);
            }
            exit;
        }
}elseif ($table === "blog"){
    if (isset($_POST['add'])) {
        $imageUpload = $mysqli->real_escape_string($_POST['imageUpload']);
        $blogTitle  = $mysqli->real_escape_string($_POST['blogTitle']);
        $bloggerName = $mysqli->real_escape_string($_POST['bloggerName']);
        $subTitle = $mysqli->real_escape_string($_POST['subTitle']);
        $publishDate = $mysqli->real_escape_string($_POST['publishDate']);
        $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);

        $query = "INSERT INTO `blog` (`imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) 
                        VALUES ('$imageUpload', '$blogTitle', '$bloggerName','$subTitle', '$publishDate', '$commentsCount')";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Insertion failed: " . $mysqli->error]);
        }
        exit;
    }
    if (isset($_POST['edit_id'])) {
        $id = intval($_POST['edit_id']);
        $result = $mysqli->query("SELECT * FROM `blog` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode($user, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }
            // 3. Update user data
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
                $id = intval($_POST['id']);  
                $blogTitle     = $mysqli->real_escape_string($_POST['blogTitle']);
                $bloggerName   = $mysqli->real_escape_string($_POST['bloggerName']);
                $subTitle      = $mysqli->real_escape_string($_POST['subTitle']);
                $publishDate   = $mysqli->real_escape_string($_POST['publishDate']);
                $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);
            
                $query = "UPDATE `blog` SET 
                            `blogTitle`='$blogTitle',
                            `bloggerName`='$bloggerName',
                            `subTitle`='$subTitle',
                            `publishDate`='$publishDate',
                            `commentsCount`='$commentsCount'
                            WHERE `id` = '$id'";
            
                if ($mysqli->query($query)) {
                    echo json_encode(["success" => true]);
                } else {
                    echo json_encode(["error" => "Update failed: " . $mysqli->error]);
                }
                exit;
            }
            // 4. Delete a user
    if (isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);
        $query = "DELETE FROM `blog` WHERE `id` = '$id'";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Deletion failed: " . $mysqli->error]);
        }
        exit;
    }
    try {
        $result = $mysqli->query("SELECT * FROM `blog`");
        $snake = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($snake, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(["error" => "Error: " . $e->getMessage()]);
    }
    exit;
}else if($table === "contact"){
    if($_POST['action'] == 'getData'){
        $id = 1;
        $result = $mysqli->query("SELECT * FROM `contact` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $contact = $result->fetch_assoc();
            echo json_encode($contact, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
        $phone     = $mysqli->real_escape_string($_POST['phone']);
        $email    = $mysqli->real_escape_string($_POST['email']);
        $address = $mysqli->real_escape_string($_POST['address']);
    
        $query = "UPDATE `contact` SET 
        `phone`='$phone',
        `email`='$email',
        `address`='$address'
        WHERE `id` = 1";
            if ($mysqli->query($query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["error" => "Update failed: " . $mysqli->error]);
            }
            exit;
        }
}else if($table === "msg"){


    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "insert") {
        $name     = $mysqli->real_escape_string($_POST['name']);
        $email    = $mysqli->real_escape_string($_POST['email']);
        $subject  = $mysqli->real_escape_string($_POST['subject']);
        $message  = $mysqli->real_escape_string($_POST['message']);

        $query = "INSERT INTO `msg`( `name`, `email`, `subject`, `massage`)
        VALUES ('$name','$email','$subject','$message')";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Insertion failed: " . $mysqli->error]);
        }
        exit;
    }

    // Action: Get all messages for the dashboard
    if (isset($_POST['action']) && $_POST['action'] == 'getMessages') {
        try {
            $result = $mysqli->query("SELECT * FROM `msg` ORDER BY `id` DESC");
            $messages = $result->fetch_all(MYSQLI_ASSOC);
            echo json_encode($messages, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            echo json_encode(["error" => "Error fetching messages: " . $e->getMessage()]);
        }
        exit;
    }

    // Action: Delete a message from the dashboard
    if (isset($_POST['action']) && $_POST['action'] == 'deleteMessage') {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $query = "DELETE FROM `msg` WHERE `id` = '$id'";
            if ($mysqli->query($query)) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["error" => "Deletion failed: " . $mysqli->error]);
            }
        } else {
            echo json_encode(["error" => "Message ID not provided"]);
        }
        exit;
    }
}elseif ($table === "post"){
    if (isset($_POST['add'])) {
        $imageUpload = $mysqli->real_escape_string($_POST['imageUpload']);
        $blogTitle  = $mysqli->real_escape_string($_POST['blogTitle']);
        $bloggerName = $mysqli->real_escape_string($_POST['bloggerName']);
        $subTitle = $mysqli->real_escape_string($_POST['subTitle']);
        $publishDate = $mysqli->real_escape_string($_POST['publishDate']);
        $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);

        $query = "INSERT INTO `post` (`imageUpload`, `blogTitle`, `bloggerName`, `subTitle`, `publishDate`, `commentsCount`) 
                        VALUES ('$imageUpload', '$blogTitle', '$bloggerName','$subTitle', '$publishDate', '$commentsCount')";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Insertion failed: " . $mysqli->error]);
        }
        exit;
    }
    if (isset($_POST['edit_id'])) {
        $id = intval($_POST['edit_id']);
        $result = $mysqli->query("SELECT * FROM `post` WHERE `id` = '$id'");
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode($user, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["error" => "User not found"]);
        }
        exit;
    }
            // 3. Update user data
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"]) && $_POST["action"] === "update") {
                $id = intval($_POST['id']);  
                $blogTitle     = $mysqli->real_escape_string($_POST['blogTitle']);
                $bloggerName   = $mysqli->real_escape_string($_POST['bloggerName']);
                $subTitle      = $mysqli->real_escape_string($_POST['subTitle']);
                $publishDate   = $mysqli->real_escape_string($_POST['publishDate']);
                $commentsCount = $mysqli->real_escape_string($_POST['commentsCount']);
            
                $query = "UPDATE `post` SET 
                            `blogTitle`='$blogTitle',
                            `bloggerName`='$bloggerName',
                            `subTitle`='$subTitle',
                            `publishDate`='$publishDate',
                            `commentsCount`='$commentsCount'
                            WHERE `id` = '$id'";
            
                if ($mysqli->query($query)) {
                    echo json_encode(["success" => true]);
                } else {
                    echo json_encode(["error" => "Update failed: " . $mysqli->error]);
                }
                exit;
            }
            // 4. Delete a user
    if (isset($_POST['delete_id'])) {
        $id = intval($_POST['delete_id']);
        $query = "DELETE FROM `post` WHERE `id` = '$id'";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Deletion failed: " . $mysqli->error]);
        }
        exit;
    }
    try {
        $result = $mysqli->query("SELECT * FROM `post`");
        $snake = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($snake, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        echo json_encode(["error" => "Error: " . $e->getMessage()]);
    }
    exit;
}elseif ($table === "comment"){
    if (isset($_POST['add'])) {
        $name = $mysqli->real_escape_string($_POST['name']);
        $comment = $mysqli->real_escape_string($_POST['message']);

        $query = "INSERT INTO `comment` (`name`, `comment`) 
                        VALUES ('$name', '$comment')";
        if ($mysqli->query($query)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Insertion failed: " . $mysqli->error]);
        }
        exit;
    }
    if (isset($_POST['action']) && $_POST['action'] == 'getData') {
        try {
            $result = $mysqli->query("SELECT * FROM `comment` ORDER BY `id` DESC");
            $raw_comments = $result->fetch_all(MYSQLI_ASSOC);
            $comments_to_send = array_map(function($comment_item) {
                if (isset($comment_item['comment'])) {
                    $comment_item['message'] = $comment_item['comment'];
                    // unset($comment_item['comment']); // Можно раскомментировать, если оригинальный ключ 'comment' не нужен
                }
                return $comment_item;
            }, $raw_comments);
            echo json_encode($comments_to_send, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            echo json_encode(["error" => "Error fetching comments: " . $e->getMessage()]);
        }
        exit;
    }
exit;
}