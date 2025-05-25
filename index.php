<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(135deg, #1f4037, #99f2c8);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

form {
  background-color: #fff;
  padding: 2rem;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
  gap: 1rem;
  width: 300px;
}

h1 {
  position: absolute;
  top: 10%;
  color: #fff;
  font-size: 2.5rem;
  font-weight: bold;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
}

input[type="text"],
input[type="password"] {
  padding: 0.8rem;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 1rem;
  transition: 0.3s;
}

input[type="text"]:focus,
input[type="password"]:focus {
  outline: none;
  border-color: #1f4037;
  box-shadow: 0 0 5px rgba(31, 64, 55, 0.5);
}

input[type="submit"] {
  background-color: #1f4037;
  color: #fff;
  padding: 0.8rem;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #16332a;
}

</style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN </h1>
    <form action="cek_login.php" method="post">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="Pasword" name="password">
        <input type="submit" value="LOGIN">
    </form>

</body>
</html>