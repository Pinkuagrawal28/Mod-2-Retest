<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<div class="">
    <h1>Create Team </h1>
    <a href="/logout" title="logout">Logout</a>
    <form hx-post="/addtoteam" hx-target="#teamdiv" hx-swap="beforeend" hx-reset-on-success class="form-group">
    <input type="text" name="player_id" placeholder="Player Id..." required class="form-control">
    <button type="submit" class="">Add</button>
  </form>
    <div>
    <h3>Available Player</h3>
    <table class="">
      <thead class="">
        <tr>
          <th scope="col" class="">Player Id.</th>
          <th scope="col" class="">Player Name</th>
          <th scope="col" class="">Player Type</th>
          <th scope="col" class="">Points</th>
        </tr>
      </thead>
      <tbody id="">
        <?php foreach ($players as $player): ?>
          <tr class="" id="singleitem">
            <td class=""><?php echo htmlspecialchars($player['employee_id']) ?></td>
            <td class=""><?php echo htmlspecialchars($player['employee_name']) ?></td>
            <td class=""><?php echo htmlspecialchars($player['player_type']) ?></td>
            <td class=""><?php echo htmlspecialchars($player['points']) ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
  </div>

<div>
  <h3> Your Selection </h3>
  <table class="">
      <thead class="">
        <tr>
          <th scope="col" class="">Player Id.</th>
          <th scope="col" class="">Player Name</th>
          <th scope="col" class="">Player Type</th>
          <th scope="col" class="">Points</th>
          <th scope="col" class="">Delete</th>
        </tr>
      </thead>
      <tbody id="teamdiv">
        <?php foreach ($currentplayers as $player): ?>
          <tr class="" id="singleitem">
            <td class=""><?php echo htmlspecialchars($player['employee_id']) ?></td>
            <td class=""><?php echo htmlspecialchars($player['employee_name']) ?></td>
            <td class=""><?php echo htmlspecialchars($player['player_type']) ?></td>
            <td class=""><?php echo htmlspecialchars($player['points']) ?></td>
            <td class="px-6 py-4">
              <a hx-get="/deletefromteam" hx-target="closest tr"
              hx-swap="outerHTML"
              class="">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/htmx.org@2.0.4"></script>
</body>
</html>