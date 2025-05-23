<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IPL Auction</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>

<section class="section-box login-section">
      <h3>Login to the App</h3>
      <form action="/login" method="POST" enctype="multipart/form-data" class="generate-form">
      <div class="mb-3">
          <label for="email" class="form-label">Enter Email Id : </label>
          <input type="email" name="email" id="email" title="Must be a valid mail" class="form-control" placeholder="something@gmail.com" required/>

        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password : </label>
          <input type="password" name="password" id="password" class="form-control" required/>
        </div>

        <button type="submit" class="btn btn-primary custom-btn">Login</button>
      </form>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/htmx.org@2.0.4"></script>
</body>
</html>