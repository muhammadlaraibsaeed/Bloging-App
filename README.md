# Finijeers Coding Challenge Solution 💻

Make sure your internet connection is active because I am using the Content Delivery Network (CDN) for Bootstrap and jQuery.

## Tech Stack for this Solution 🐘

-   Laravel ^10.10, PHP ^8.1.
-   Bootsrap 5
-   JQuery
-   MySQL

## Getting Started 🏃

-   Create a local copy of the repository.
-   Make sure you have xxamp or something similiar.
-   Create a database, name it 'laravel_ikionic'.
-   Setup .env file `cp .env .example .env`
-   Run `composer install` and `php artisan key:generate`.
-   Run `npm install` and `npm run dev`.
-   When you see the login page, head over the register page, create an account and log in. After     that you wil able do following thiings Add ,Comments,Like,Dislikes FeedBack.
-   `php artisan migrate` For Migration Table Into Database
- When you see the login page, head over to the register page, create an account, and log in. After that, you will be able to add posts, like posts, and store multiple images.

# Solution ✅

## Fetch Users with Posts
- Retrieve all users who have at least one post.
- For each user, retrieve a maximum of 5 posts.

## Like System for Posts

- List all posts, indicating whether the current user has liked each post.
    
## List all posts, indicating whether the current user has liked each post.

-  Store multiple images associated with posts in the database and storage.

## Automatic Post Deletion
- A Laravel command is set up to automatically delete posts after 24 hours. You can trigger it manually using `php artisan schedule:run` or ensure it runs regularly with Laravel's task scheduler

## Command to Delete Posts

- To automatically delete posts after 24 hours, run `php artisan  delete:posts` in the background or set up a cron job to run Laravel's scheduler
- 
## Email Notification Queue

- Ensure that the php artisan queue:work command is running in the background for job queues to process email notifications when new posts are added.


## Form Validation Rule
 Title Required
 Image Required
 
 ## Notification Setting
- I have set up Mailtrap to send notifications when new posts are created.
- Make sure your email settings are correctly configured in the .env file.

<!-- Link For Mailtrap -->
https://mailtrap.io/home

## Queue with Email
- To ensure that post notifications are queued and emails are sent, run the `php artisan queue:work` command. If the queue is not running, notifications will remain in the jobs table without sending emails.


