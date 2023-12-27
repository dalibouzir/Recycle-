<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/Recycling.png" type="image/png">
    <link rel="shortcut icon" href="images/Recycling.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Recycling Forum</title>
</head>
<body>
    
    <header>
        <h1>Recycling Forum</h1>
        Members: <span id="members">93</sapn>
    </header>
    
    <main>
        <div class="tabs" >
            <button id="post-tab" class="tab active">Add Post</button>
            <button id="event-tab" class="tab">Add Event</button>
        </div>
        
        <div class="forms">
            <form id="post-form" method="post">
                <div class="post-form">
                   
                    <label for="post-title">Title:</label>
                    <input type="text" name="post-title" id="post-title"><br>
            
                    <label for="post-content">Content:</label>
                    <textarea name="post-content" id="post-content" rows="4" cols="50"></textarea><br>
            
                    <label for="post-photo">Photo URL:</label>
                    <input type="text" name="post-photo" id="post-photo"><br>
            
                    <label for="post-link">Link URL:</label>
                    <input type="text" name="post-link" id="post-link">
            
                    <button type="button" id="publish-post">Publish</button>
                </div>
            </form>
            <form id="event-form" method="post">
            <div class="event-form">
                <input type="text" id="event-title" name="event-title" placeholder="Title">
                <textarea type="text" id="event-description" name="event-description" placeholder="Description"></textarea>
                <input type="text" id="event-location" name="event-location" placeholder="Location">
                <input type="datetime-local" id="event-datetime" name="event-datetime">
                <button id="publish-event">Publish</button>
            </div>
            </form>
        </div>
        
        <div class="content">
            <div id="post-list">  <h2>Recent Posts</h2>
            <form action="posts.php" method="post">
            <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webapp";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->query("SELECT * FROM post");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="post">';
            echo '<div class="user-info">';
            echo '<img class="user-pic" src="images/User.png" alt="User Profile Pic">';
            echo '<span class="user-name">' . $row['username'] . '</span>';
            echo '</div>';
            echo '<h3 class="post-title">' . $row['title'] . '</h3>';
            echo '<p class="post-content">' . $row['content'] . '</p>';
            echo $row['PHOTO_URL'] ? '<img class="post-photo" src="' . $row['PHOTO_URL'] . '" alt="' . $row['title'] . '" onClick="showImage(\'' . $row['PHOTO_URL'] . '\')">' : '';
            echo $row['LINK_URL'] ? '<a class="post-link" href="' . $row['LINK_URL'] . '" target="_blank">Learn More</a>' : '';
            echo '</div>'; // Close the 'post' div
            echo '<div class="reactions">';
            echo '<button class="react-button" data-reaction="👍" onclick="reactToPost(this)">👍 ' . $row['reactions']['thumbsUp'] . '</button>';
            echo '<button class="react-button" data-reaction="👎" onclick="reactToPost(this)">👎 ' . $row['reactions']['thumbsDown'] . '</button>';
            echo '<button class="react-button" data-reaction="❤️" onclick="reactToPost(this)">❤️ ' . $row['reactions']['love'] . '</button>';
            echo '</div>';
            echo '<button class="show-comments-button" onclick="showComments(this)">Show Comments</button>';
            echo '<div class="comment-section" style="display: none;">';
            echo '<h4>Comments:</h4>';
            echo '<div class="comment-list"></div>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
            </form></div>
            <div id="event-list"><h2>Upcoming Events</h2>
            <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webapp";
    try {
        $stmt = $conn->query("SELECT * FROM events");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="event">';
            echo '<div class="user-info">';
            echo '<img class="user-pic" src="images/User.png" alt="User Profile Pic">';
            echo '<span class="user-name">' . $row['username'] . '</span>';
            echo '</div>';
            echo '<h3 class="event-title">' . $row['title'] . '</h3>';
            echo '<p class="event-description">' . $row['description'] . '</p>';
            echo '<p class="event-details">Location: ' . $row['location'] . '</p>';
            echo '<p class="event-details">Date & Time: ' . date("Y-m-d H:i:s", strtotime($row['datetime'])) . '</p>';
            echo '<div class="participation">';
            echo '<button class="star-button" data-starred="false" onclick="toggleParticipation(this)">⭐ ' . $row['participants'] . ' Participants</button>';
            echo '</div>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
        </div>
        </div>
        <button id="scroll-up-button" onclick="scrollToTop()">&#8679;</button>
    </main>
    <script src="js/script.js"></script>
    <script>
 function showComments(button) {
            const postElement = button.closest('.post'); // Find the parent post
            const commentSection = postElement.querySelector('.comment-section');
            const commentList = postElement.querySelector('.comment-list');

            commentList.innerHTML = ''; // Clear the comment list

            // Sample comments for demonstration purposes
            const comments = [
                { userName: "Member1", text: "Great post!" },
                { userName: "Member2", text: "I agree!" },
                { userName: "Member3", text: "Well done!" },
                // Add more comments as needed
            ];

            comments.forEach(comment => {
                const commentDiv = document.createElement('div');
                commentDiv.className = 'comment';
                commentDiv.innerHTML = `
                <img class="comment-member-pic" src="images/User.png" alt="User Profile Pic">
    <div class="comment-content">
        <span class="comment-member-name">${comment.userName}</span>
        <p class="comment-text">${comment.text}</p>
    </div>

                `;
                commentList.appendChild(commentDiv);
            });

            commentSection.style.display = 'block';
            button.innerText = 'Hide Comments';
            button.setAttribute('onclick', 'hideComments(this)');
        }

        function hideComments(button) {
            const postElement = button.closest('.post'); // Find the parent post
            const commentSection = postElement.querySelector('.comment-section');

            commentSection.style.display = 'none';
            button.innerText = 'Show Comments';
            button.setAttribute('onclick', 'showComments(this)');
        }
        function submitComment(button) {
            const postElement = button.closest('.post'); // Find the parent post
            const commentInput = postElement.querySelector('.comment-input');
            const commentList = postElement.querySelector('.comment-list');

            const commentText = commentInput.value;
            if (commentText) {
                const comment = document.createElement('div');
                comment.className = 'comment';
                comment.textContent = commentText;
                commentList.appendChild(comment);
                commentInput.value = '';
            }
        }
        function toggleParticipation(button) {
        const starred = button.getAttribute('data-starred') === 'true';
        if (starred) {
            button.setAttribute('data-starred', 'false');
            button.innerHTML = `⭐ ${parseInt(button.textContent.split(' ')[1]) - 1} Participants`;
            button.classList.remove('starred');
        } else {
            button.setAttribute('data-starred', 'true');
            button.innerHTML = `⭐ ${parseInt(button.textContent.split(' ')[1]) + 1} Participants`;
            button.classList.add('starred');
        }
    }
//     function showImage(imageUrl) {

// alert(`Displaying image: ${imageUrl}`);
// }
function showImage(imageUrl) {

  var overlay = document.createElement('div');
  overlay.style.position = 'fixed';
  overlay.style.top = '0';
  overlay.style.left = '0';
  overlay.style.width = '100%';
  overlay.style.height = '100%';
  overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.7)';
  overlay.style.display = 'flex';
  overlay.style.alignItems = 'center';
  overlay.style.justifyContent = 'center';
  overlay.style.zIndex = '9999';

  // Create the enlarged image element
  var enlargedImg = document.createElement('img');
  enlargedImg.src = imageUrl;
  enlargedImg.style.maxWidth = '90%';
  enlargedImg.style.maxHeight = '90%';
  enlargedImg.style.boxShadow = '0 0 20px rgba(0, 0, 0, 0.5)';
  enlargedImg.style.cursor = 'pointer';


  overlay.appendChild(enlargedImg);


  overlay.addEventListener('click', function() {
    document.body.removeChild(overlay);
  });


  document.body.appendChild(overlay);
}



    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }


    function reactToPost(button) {
        const reactionType = button.getAttribute('data-reaction');
        const reactionCount = parseInt(button.textContent.split(' ')[1]);
        button.textContent = `${reactionType} ${reactionCount + 1}`;
    }
    document.getElementById("publish-post").addEventListener("click", function() {
        var form = document.getElementById("post-form");
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Forum_php.php");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);
    });
    document.getElementById("publish-event").addEventListener("click", function() {
        var form = document.getElementById("event-form");
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "Forum_php.php");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the server if needed
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);
    });
    
    </script>
</body>
</html>
