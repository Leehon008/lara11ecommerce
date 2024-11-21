## About the Project
Lara11Ecommerce is a laravel ecommerce application.

## Version Control
You need to run the git commands to version control the source code
- first you need to pull the repo 
> git clone repo_name
- then to patch updates you can use the old way to push changes ``git push`` but for this we have many repo destinations so its wise to use the `cmd` function in the shell file below using git bash or any terminal
> ./push_all.sh 

this updates the repos in the shell file

## Cron Job to clear cache
Yes, it is possible to create a cron job in cPanel to periodically run the php artisan optimize:clear command. Here’s how you can do it:

### Steps to Set Up the Cron Job
Log in to cPanel: Access your cPanel account provided by your hosting service.

Navigate to the Cron Jobs Section: In the cPanel dashboard, locate the Cron Jobs icon under the Advanced section.

Add a New Cron Job:

Email Notification: (Optional) If you want email notifications for the cron job execution, ensure an email is set under Email in the Cron Jobs section. Otherwise, add >/dev/null 2>&1 at the end of the command to suppress notifications.

Set the Time Interval: Use the predefined intervals or custom settings to specify when the cron job should run. For example:
- Every hour: 0 * * * *
- Daily at midnight: 0 0 * * *
- Weekly: 0 0 * * 0
  
Command to Execute: Enter the command to run the `Artisan` command:

`bash  `
> /usr/local/bin/php /home3/gowgdiyg/public_html/artisan optimize:clear >> /home3/gowgdiyg/cron-log.txt 2>&1