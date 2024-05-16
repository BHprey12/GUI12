<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="./adminscss/settings.css">
</head>
<body>
    <header>
        <h1>Settings</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#account-settings">Account Settings</a></li>
            <li><a href="#privacy-settings">Privacy Settings</a></li>
            <li><a href="#notification-settings">Notification Settings</a></li>
            <li><a href="#payment-settings">Payment Settings</a></li>
        </ul>
    </nav>
    <main>
        <section id="account-settings">
            <h2>Account Settings</h2>
            <form>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <button type="submit">Save Changes</button>
            </form>
        </section>
        <section id="privacy-settings">
            <h2>Privacy Settings</h2>
            <form>
                <label for="public-profile">Public Profile:</label>
                <input type="checkbox" id="public-profile" name="public-profile"><br><br>
                <label for="data-sharing">Data Sharing:</label>
                <input type="checkbox" id="data-sharing" name="data-sharing"><br><br>
                <button type="submit">Save Changes</button>
            </form>
        </section>
        <section id="notification-settings">
            <h2>Notification Settings</h2>
            <form>
                <label for="email-notifications">Email Notifications:</label>
                <input type="checkbox" id="email-notifications" name="email-notifications"><br><br>
                <label for="sms-notifications">SMS Notifications:</label>
                <input type="checkbox" id="sms-notifications" name="sms-notifications"><br><br>
                <button type="submit">Save Changes</button>
            </form>
        </section>
        <section id="payment-settings">
            <h2>Payment Settings</h2>
            <form>
                <label for="credit-card">Credit Card:</label>
                <input type="text" id="credit-card" name="credit-card"><br><br>
                <label for="paypal">PayPal:</label>
                <input type="text" id="paypal" name="paypal"><br><br>
                <button type="submit">Save Changes</button>
            </form>
        </section>
    </main>
  
</body>
</html>