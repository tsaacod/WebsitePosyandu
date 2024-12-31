<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E8F5E9;
        }

        .navbar {
            background-color: #297F4C; 
            padding: 10px;
            text-align: center;
        }

        .navbar h1 {
            color: white; 
            margin: 0;
            font-family: 'Potta One', sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); 
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px; 
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #297F4C; 
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block; 
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px; 
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #297F4C;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #245d3a; 
        }

        .error-message {
            color: red;
            margin-top: 15px;
            text-align: center; 
        }

        a {
            color: #297F4C;
            text-decoration: none;
            display: block; 
            text-align: center; 
            margin-top: 10px; 
        }
    </style>

   
    <div class="navbar">
        <h1>E-POSYANDU</h1>
    </div>

    <div class="login-container">
        <div class="login-box">
            <h2>Selamat Datang</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">Login</button>
            </form>

            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>