<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do : Task Reminder</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div>
                        <div>
                            You have a task due in 3 hours!
                        </div>
                        <div>
                            <p>Hi {{ $user->name }},</p>
                            <br>
                            <p>Please find below a friendly reminder of the task that are due in 3 hours.</p>
                        </div>
                        <br>
                        <br>
                        <div>
                            <table>
                                <tr>
                                    <td> Task:</td><td> {{ $task->title }}</td>
                                </tr>
                                <tr>
                                    <td> Created On:</td><td> {{ Carbon\Carbon::parse($task->create_at)->format('Y/m/d H:i:s') }}</td>
                                </tr>
                                <tr>
                                    <td> Due On:</td><td> {{ Carbon\Carbon::parse($task->due_on)->format('Y/m/d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div>
                            <p>Thanks,</p>
                            <p>TO-DO List Team.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
