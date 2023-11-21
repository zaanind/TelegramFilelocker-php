# TelegramFilelocker-php
Telegram File Sharing Bot written in php


Setup Instructions
1. Set up Webhook
To enable communication between your Telegram File Sharing Bot and the Telegram servers, you need to set up a webhook. Follow the steps below:

Obtain a valid SSL certificate for your server. Telegram requires a secure connection (HTTPS) for webhooks.

Set the webhook URL using the Bot API. Replace YOUR_BOT_TOKEN with your actual bot token.


https://api.telegram.org/bot<YOUR_BOT_TOKEN>/setWebhook?url=https://your-domain.com/path/to/your/webhook.php

2. Set Environment Variables
Ensure you have the following environment variables set. These are essential for the proper functioning of the bot.

tk: Your Telegram bot token.
chn: The channel where the bot will store files.
admin1: The Telegram user ID of the first admin.
admin2: The Telegram user ID of the second admin.
Example:


$tkn = getenv('tk');
$chn = getenv('chn');
$admin1 = getenv('admin1');
$admin2 = getenv('admin2');


3. Bot Usage
Your Telegram File Sharing Bot is now ready to use! You can share files in the specified channel, and the configured admins will have control over the bot.

Disclaimer
Ensure you handle sensitive information, such as bot tokens and user IDs, securely. Follow best practices for bot development and adhere to Telegram's policies.

Happy botting!
