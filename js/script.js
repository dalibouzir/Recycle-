document.addEventListener('DOMContentLoaded', () => {
    const postTab = document.getElementById('post-tab');
    const eventTab = document.getElementById('event-tab');
    const postForm = document.querySelector('.post-form');
    const eventForm = document.querySelector('.event-form');
    const postList = document.getElementById('post-list');
    const eventList = document.getElementById('event-list');


    postTab.addEventListener('click', () => {
        postTab.classList.add('active');
        eventTab.classList.remove('active');
        postForm.style.display = 'block';
        eventForm.style.display = 'none';
    });

    eventTab.addEventListener('click', () => {
        eventTab.classList.add('active');
        postTab.classList.remove('active');
        postForm.style.display = 'none';
        eventForm.style.display = 'block';
    });

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
    
    // function createPostElement(post) {
    //     const postElement = document.createElement('div');
    //     postElement.className = 'post';
    //     postElement.innerHTML = `
    //         <div class="user-info">
    //             <img class="user-pic" src="images/User.png" alt="User Profile Pic">
    //             <span class="user-name">${post.userName}</span>
    //         </div>
    //         <h3 class="post-title">${post.title}</h3>
    //         <p class="post-content">${post.content}</p>
    //         ${post.photo ? `<img class="post-photo" src="${post.photo}" alt="${post.title}" onClick="showImage('${post.photo}')">` : ''}
    //         ${post.link ? `<a class="post-link" href="${post.link}" target="_blank">Learn More</a>` : ''}
    //         <div class="reactions">
    //             <button class="react-button" data-reaction="👍" onclick="reactToPost(this)">👍 ${post.reactions.thumbsUp}</button>
    //             <button class="react-button" data-reaction="👎" onclick="reactToPost(this)">👎 ${post.reactions.thumbsDown}</button>
    //             <button class="react-button" data-reaction="❤️" onclick="reactToPost(this)">❤️ ${post.reactions.love}</button>
    //         </div>
    //         <button class="show-comments-button" onclick="showComments(this)">Show Comments</button>
    //         <div class="comment-section" style="display: none;">
    //             <h4>Comments:</h4>
    //             <div class="comment-list"></div>
    //         </div>
    //     `;
        
    //     return postElement;
        
       
    // }

    

    // function createEventElement(event) {
    //     const eventElement = document.createElement('div');
    //     eventElement.className = 'event';
    //     eventElement.innerHTML = `
    //         <div class="user-info">
    //         <img class="user-pic" src="images/User.png" alt="User Profile Pic">
    //         <span class="user-name">${event.userName}</span>
    //         </div>
    //         <h3 class="event-title">${event.title}</h3>
    //         <p class="event-description">${event.description}</p>
    //         <p class="event-details">Location: ${event.location}</p>
    //         <p class="event-details">Date & Time: ${new Date(event.datetime).toLocaleString()}</p>
    //         <div class="participation">
    //             <button class="star-button" data-starred="false" onclick="toggleParticipation(this)">⭐ ${event.participants} Participants</button>
    //         </div>
            
    //     `;
        
    //     return eventElement;
    
    // }

   

   


    // samplePosts.forEach((post) => {
    //     const postElement = createPostElement(post);
    //     postList.appendChild(postElement);
    // });

    // sampleEvents.forEach((event) => {
    //     const eventElement = createEventElement(event);
    //     eventList.appendChild(eventElement);
    // });


   


    

    


//     const publishPostButton = document.getElementById('publish-post');
//     publishPostButton.addEventListener('click', () => {

//         const postTitle = document.getElementById('post-title').value;
//         const postContent = document.getElementById('post-content').value;
//         const postPhoto = document.getElementById('post-photo').value;
//         const postLink = document.getElementById('post-link').value;


//         const newPost = {
//             title: postTitle,
//             content: postContent,
//             photo: postPhoto,
//             link: postLink,
//             reactions: { thumbsUp: 0, thumbsDown: 0, love: 0 },
//         };


//         const postElement = createPostElement(newPost);
//         postList.insertBefore(postElement, postList.firstChild);


//         document.getElementById('post-title').value = '';
//         document.getElementById('post-content').value = '';
//         document.getElementById('post-photo').value = '';
//         document.getElementById('post-link').value = '';
//     });


//     const publishEventButton = document.getElementById('publish-event');
//     publishEventButton.addEventListener('click', () => {

//         const eventTitle = document.getElementById('event-title').value;
//         const eventDescription = document.getElementById('event-description').value;
//         const eventLocation = document.getElementById('event-location').value;
//         const eventDatetime = document.getElementById('event-datetime').value;


//         const newEvent = {
//             title: eventTitle,
//             description: eventDescription,
//             location: eventLocation,
//             datetime: eventDatetime,
//             participants: 0,
//         };


//         const eventElement = createEventElement(newEvent);
//         eventList.insertBefore(eventElement, eventList.firstChild);


//         document.getElementById('event-title').value = '';
//         document.getElementById('event-description').value = '';
//         document.getElementById('event-location').value = '';
//         document.getElementById('event-datetime').value = '';
//     });
});
