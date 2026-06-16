<?php
defined('ABSPATH') || exit;

// Read saved settings. Fall back to safe defaults if missing.
$opts     = get_option('tr_maintenance_mode_settings', [
    'maintenance' => false,
    'headline' => 'Site Under Maintenance',
    'message' => "We're performing scheduled maintenance. Please try again later."
]);
$headline = ! empty($opts['headline']) ? esc_html($opts['headline']) : 'Site Under Maintenance';
$message  = ! empty($opts['message'])  ? esc_html($opts['message'])  : "We're performing scheduled maintenance. Please try again later.";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $headline; ?></title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .card {
            background: #ffffff;
            border-radius: 10px;
            padding: 3rem 2.5rem;
            max-width: 500px;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 1.25rem;
            display: block;
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #111;
            line-height: 1.2;
        }

        p {
            font-size: 1rem;
            line-height: 1.7;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="card">
        <span class="icon">🔧</span>
        <h1><?php echo $headline; ?></h1>
        <p><?php echo $message; ?></p>
    </div>
</body>

</html>