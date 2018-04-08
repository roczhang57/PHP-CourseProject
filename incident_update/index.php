<?php
require('../model/database.php');
require('../model/technician_db.php');
require('../model/incident_db.php');
require('../model/customer_db.php');

// Start session
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        if (isset($_SESSION['tech_email'])) {    // Skip login if customer is in the session
            $action = 'show_list';
        } else {
            $action = 'display_login';
        }
    }
}

switch ($action) {
    case 'display_login':
        include('technician_login.php');
        break;
     
    case 'technician_login':
        if (isset($_POST['email']) AND isset($_POST['password'])) {
            $username = $_POST['email'];
            $password = $_POST['password'];
        }
        if (TechnicianDB::is_valid_technician_login($username, $password)) {
            $_SESSION['tech_email'] = $username;
            $technician = TechnicianDB::get_technician_by_email($_SESSION['tech_email']);
            $incidents = get_open_incidents($technician['techID']);
            include('incident_list.php');
        } else {
            include('technician_login.php');
        }
        break;
        
    case 'show_list':
        $technician = TechnicianDB::get_technician_by_email($_SESSION['tech_email']);
        $incidents = get_open_incidents($technician['techID']);
        include('incident_list.php');
        break;

    case 'show_update_form':   
        $id = filter_input(INPUT_POST, 'id');
        $incident = get_incident($id);
        include('update_incident.php');
        break;
    
    case 'update_incident':  
        $incident_id = filter_input(INPUT_POST, 'incidentID', FILTER_VALIDATE_INT);
        $date_closed = filter_input(INPUT_POST, 'closed');
        $date = date('Y-m-d', strtotime($date_closed));
        $description = filter_input(INPUT_POST, 'description');
        update_incident($incident_id, $date, $description); 
        include('incident_updated.php');
        break;
     
    case 'logout':
        unset($_SESSION['tech_email']);
        include('technician_login.php');
        break;
}

?>

