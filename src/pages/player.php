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
      <h3>Add Players</h3>
      <a href="/logout" title="logout">Logout</a>
      <form action="/add-player" method="POST" enctype="multipart/form-data" class="generate-form">
      <div class="mb-3">
          <label for="emid" class="form-label">Enter employee id: </label>
          <input type="text" name="emid" id="emid" class="form-control" placeholder="" required/>

        </div>

        <div class="mb-3">
          <label for="emname" class="form-label">Enter employee name: </label>
          <input type="text" name="emname" id="name" class="form-control" placeholder="" required/>

        </div>

        <div class="mb-3">
          <label for="playertype" class="form-label">Player Type</label>
          <select name="playertype" id="playertype" class="form-control">
            <option value="bat">Batsman</option>
            <option value="ball">Bowler</option>
            <option value="all">All Rounder</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="points" class="form-label">points For Player : </label>
          <input type="number" name="points" id="points" class="form-control" required/>
        </div>

        <button type="submit" class="btn btn-primary custom-btn">Add Player</button>
      </form>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/htmx.org@2.0.4"></script>
</body>
</html>