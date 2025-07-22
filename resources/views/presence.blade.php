<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Presence</title>
  <link rel="stylesheet" href="css/presence.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
  <div class="sidebar">
    <div class="logo_details">
      <img src="meetingsreminder.png" alt="logo_icon" />
      <div class="logo_name">TimetoMeet</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class="bx bx-search"></i>
        <input type="text" placeholder="Search..." />
        <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="dashboard_member">
          <i class="bx bxs-home"></i>
          <span class="link_name">Home</span>
        </a>
        <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="schedule">
          <i class="bx bxs-calendar-check"></i>
          <span class="link_name">Schedule</span>
        </a>
        <span class="tooltip">Schedule</span>
      </li>
      <li>
        <a href="kalendermember">
          <i class="bx bxs-calendar"></i>
          <span class="link_name">Calendar</span>
        </a>
        <span class="tooltip">Calendar</span>
      </li>
      <li>
        <a href="teams">
          <i class="bx bxs-group"></i>
          <span class="link_name">Teams</span>
        </a>
        <span class="tooltip">Teams</span>
      </li>
      <li>
        <a href="presence">
          <i class="bx bx-user-check"></i>
          <span class="link_name">Presence</span>
        </a>
        <span class="tooltip">Presence</span>
      </li>
      <li>
        <a href="task2.php">
          <i class="bx bx-task-x"></i>
          <span class="link_name">Tasks</span>
        </a>
        <span class="tooltip">Tasks</span>
      </li>
      <li class="profile">
        <div class="profile_details">
          <img src="fox.jpg" alt="profile image" />
          <div class="profile_content">
            <div class="name">User Name</div>
            <div class="designation">Role</div>
          </div>
        </div>
        <i class="bx bx-log-out" id="log_out"></i>
      </li>
    </ul>
  </div>

  <div class="main-content">
    <h2>Presence List</h2>

    <form action="" method="POST">
      <input type="text" name="nama" placeholder="Nama Anggota" required />
      <input type="date" name="tanggal" required />
      <select name="status" required>
        <option value="">Choose status</option>
        <option value="Hadir">Present</option>
        <option value="Tidak Hadir">Absent</option>
        <option value="Izin">Excused</option>
      </select>
      <button type="submit" name="submit">Add</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">No absence yet.</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src="js/presence.js"></script>
</body>
</html>
