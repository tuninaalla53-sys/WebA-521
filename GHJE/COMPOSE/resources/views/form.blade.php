<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма регистрации - Laravel OOP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .radio-group, .checkbox-group {
            margin: 8px 0;
        }
        .radio-group label, .checkbox-group label {
            display: inline-block;
            margin-left: 5px;
            font-weight: normal;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Форма регистрации</h1>
        
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            
            <div class="form-group">
                <label for="username">Имя пользователя:</label>
                {!! $formElements['username'] !!}
            </div>
            
            <div class="form-group">
                <label for="email">Email адрес:</label>
                {!! $formElements['email'] !!}
            </div>
            
            <div class="form-group">
                <label for="password">Пароль:</label>
                {!! $formElements['password'] !!}
            </div>
            
            <div class="form-group">
                <label>Пол:</label>
                <div class="radio-group">
                    {!! $formElements['male_gender'] !!}
                </div>
                <div class="radio-group">
                    {!! $formElements['female_gender'] !!}
                </div>
            </div>
            
            <div class="form-group">
                <label for="country">Страна:</label>
                {!! $formElements['country'] !!}
            </div>
            
            <div class="form-group">
                <label for="hobbies">Хобби:</label>
                {!! $formElements['hobbies'] !!}
            </div>
            
            <div class="form-group">
                <div class="checkbox-group">
                    {!! $formElements['agree_terms'] !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! $formElements['submit'] !!}
            </div>
        </form>
        
        <div style="margin-top: 30px; padding: 15px; background-color: #e9ecef; border-radius: 5px;">
            <h3>О проекте:</h3>
            <p>Эта форма создана с использованием объектно-ориентированного программирования в Laravel.</p>
            <p><strong>Используемые классы:</strong> Control, Input, Radio, Checkbox, Select</p>
            <p><strong>Наследование:</strong> Radio и Checkbox → Input → Control; Select → Control</p>
        </div>
    </div>
</body>
</html>