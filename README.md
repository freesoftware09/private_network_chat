# Usage
You can create a private group chat on your server or local network.
messages save encrypt and alive for 60 minutes (you can set time inside config.php => MESSAGES_FILE_TIME_MINUTES), so you don't need any database and installation.
your server must be apache2 and support php and enable .htaccess file.
if you want to disable https auto redirect you can remove following lines from .htaccess file
```
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]
```

# How to install
1. download zip file from https://github.com/freesoftware09/private_network_chat/archive/refs/heads/master.zip
2. extract zip file on your system
3. go to private_network_chat-master directory and zip all files and directories inside it
4. upload and extract your zip file on your server or local network
5. change config (for more security please change config.php permission to 400)
6. open your domain or ip on any browser and use it :)

# Notice
If you upload file on subdirectory on your server, you must edit base tag on index.html and set realpath of file
```html
<base href="/">
```
this for root directory like public_html.
But if you upload on public_html/my-dir/sub-dir, you must change base tag to
```html
<base href="/my-dir/sub-dir/">
```

# CONFIG
1. if you want just some username login set LIMIT_USERS_LIST value to true otherwise set false
2. if LIMIT_USERS_LIST is true define usernames in USERS_LIST
3. USERS_CAN_REMOVE_ALL_CHAT option allow users to remove all group chat (true/false)
4. MESSAGES_FILE_TIME_MINUTES: remove secret messages file in MESSAGES_FILE_TIME_MINUTES value minutes
5. if you want use cron job to remove file automatically, even chat disable, you can set https://domain.com/cron.php?passwd=CRON_JOB_PASS for you cron job
