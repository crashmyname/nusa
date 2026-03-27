<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Server Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            text-align: center;
            max-width: 500px;
            padding: 40px;
        }

        .code {
            font-size: 96px;
            font-weight: 800;
            color: #38bdf8;
            letter-spacing: 5px;
        }

        .title {
            font-size: 24px;
            margin-top: 10px;
            font-weight: 600;
        }

        .desc {
            margin-top: 10px;
            color: #94a3b8;
            font-size: 14px;
        }

        .btn {
            margin-top: 30px;
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            background: #38bdf8;
            color: #0f172a;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn:hover {
            background: #0ea5e9;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #64748b;
        }

    </style>
</head>
<body>

<div class="container">

    <div class="code">500</div>

    <div class="title">
        Internal Server Error
    </div>

    <div class="desc">
        Something went wrong on our server.<br>
        Please try again later.
    </div>

    <a href="<?= url('/')?>" class="btn">Back to Home</a>

    <div class="footer">
        © <?= date('Y') ?> Nusa ERP
    </div>
</div>

</body>
</html>