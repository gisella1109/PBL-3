<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Calendar</title>
    <link rel="stylesheet" href="css/notif.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="sidebar">
    <div class="logo_details">
        <img src="meetingsreminder.png" alt="logo_icon">
        <div class="logo_name">TimetoMeet</div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
    <li>
            <i class="bx bx-search"></i>
            <input type="text" placeholder="Search...">
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
                <i class='bx bx-user-check'></i>
                <span class="link_name">Presence</span>
            </a>
            <span class="tooltip">Presence</span>
        </li>
        <li>
            <a href="task2.php">
                <i class='bx bx-task-x'></i>
                <span class="link_name">Tasks</span>
            </a>
            <span class="tooltip">Tasks</span>
        </li>
        <li class="profile">
            <div class="profile_details">
                <img src="" alt="profile image">
                <div class="profile_content">
                    <div class="name"></div>
                    <div class="designation"></div>
                </div>
            </div>
            <form action="logout.php" method="POST">
                <button type="submit" id="log_out" class="bx bx-log-out"></button>
            </form>
        </li>
    </ul>
</div>

        </ul>
    </div>
    
    <div id="calendar" style="width: 50%;"></div> <!-- Tempat untuk kalender -->
    <div id="schedule-modal" class="modal">
        <div class="modal-content">
            <h4>Schedule Details</h4>
            <p id="schedule-description"></p>
            <button id="accept-schedule" class="btn btn-success">Accept</button>
            <button id="reject-schedule" class="btn btn-danger">Reject</button>
            <button id="close-modal" class="btn btn-secondary">Close</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Inisialisasi FullCalendar
            $('#calendar').fullCalendar({
                events: scheds, // Menampilkan jadwal dari PHP
                eventClick: function(event) {
                    // Menampilkan detail jadwal di modal
                    $('#schedule-description').text(event.description);
                    $('#accept-schedule').attr('data-schedule-id', event.id);
                    $('#reject-schedule').attr('data-schedule-id', event.id);
                    $('#schedule-modal').show();
                }
            });

            // Event handler untuk menerima jadwal
            $('#accept-schedule').click(function() {
                var scheduleId = $(this).attr('data-schedule-id');
                $.post('accept_reject_schedule.php', { schedule_id: scheduleId, action: 'accept' }, function(response) {
                    $('#schedule-modal').hide();
                    location.reload(); // Reload halaman untuk melihat perubahan status
                });
            });

            // Event handler untuk menolak jadwal
            $('#reject-schedule').click(function() {
                var scheduleId = $(this).attr('data-schedule-id');
                $.post('accept_reject_schedule.php', { schedule_id: scheduleId, action: 'reject' }, function(response) {
                    $('#schedule-modal').hide();
                    location.reload(); // Reload halaman untuk melihat perubahan status
                });
            });

            // Menutup modal
            $('#close-modal').click(function() {
                $('#schedule-modal').hide();
            });
        });
    </script>
    <script src="s/group.js"></script>
    <script src="/js/script.js"></script>
    <script src="js/kalender.js"></script>
</body>
</html>
