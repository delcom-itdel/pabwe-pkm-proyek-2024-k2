<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .login-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 300px;
    }

    .login-container h2 {
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .form-group input:focus {
      outline: none;
      border-color: #4CAF50;
    }

    .login-button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      border: none;
      border-radius: 4px;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <h2>Login</h2>
  <form action="{{ route('login.submit') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
  </form>

  <!-- Display error message if credentials are incorrect -->
  @if ($errors->any())
    <div>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
  @endif
</body>

</html>