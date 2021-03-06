<?php
  session_start();
  if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
  }

include 'php/get-user-name.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="v/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="css/bugs.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">



    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-15">
          <i class="fas fa-bug"></i>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="bugs.php">
          <i class="fas fa-bug"></i>
          <span>Bugs</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
        
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        
          <!-- Topbar Search -->
          <div class="mr-auto" id="teams-buttons"></div>


          <div class="col">
              <button class="btn btn-primary float-right m-2 btn-primary-outline" data-toggle="modal" data-target="#newTeamModal">
                New team
              </button>
          </div>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" id=""><?php echo $userName ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>

        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row">
            <div class="col pt-3" id="projects-col">

            </div>
            <div class="col">
              <button type="button" class="btn border border-primary text-primary float-right m-2 btn-primary-outline" data-toggle="modal" data-target="#newBugModal">
                Submit Bug
              </button>
              <button class="btn btn-primary float-right m-2 btn-primary-outline" data-toggle="modal" data-target="#projectModal">
                    New project
              </button>
            </div>
          </div>
          <div class="row" id="content-bugs">
            <div class="col">
              <div class="card" id="card">
                <div class="card-header">
                  Open
                </div>
                <div class="m-2 h-100" id="bug-list-open">

                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" id="card">
                <div class="card-header">
                  In progress
                </div>
                <div class="m-2 h-100" id="bug-list-in-progress">
                  
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" id="card">
                <div class="card-header">
                  To be tested
                </div>
                <div class="m-2 h-100" id="bug-list-tested">
                  
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" id="card">
                <div class="card-header">
                  Reopen
                </div>
                <div class="m-2 h-100" id="bug-list-reopen">
                  
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card" id="card">
                <div class="card-header">
                  Closed
                </div>
                <div class="m-2 h-100" id="bug-list-closed">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Submit Modal -->
  <div class="modal fade" id="newBugModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Bug</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="new-bug-form">
            <div class="form-group">
              <div id="result"></div>
              <label for="bug-title">Bug title:</label>
              <input type="text" class="form-control" id="bug-title" maxlength="10" required>
            </div>
            <div class="form-group">
              <label for="bug-desc">Bug description:</label>
              <input type="text" class="form-control" id="bug-desc" maxlength="50" >
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Update Modal -->
  <div class="modal fade" id="updateBugModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Bug</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="update-bug-form">
            <div class="form-group">
              <div id="result"></div>
              <label for="bug-title">Bug title:</label>
              <input type="text" class="form-control" id="bug-title-update" maxlength="20" required>
            </div>
            <div class="form-group">
              <label for="bug-desc">Bug description:</label>
              <input type="text" class="form-control" id="bug-desc-update" maxlength="50" >
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModal">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" id="logout-button">Logout</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Project Modal -->
  <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="add-project-form">
            <div class="form-group">
              <div id="result"></div>
              <label for="bug-title">Project name:</label>
              <input type="text" class="form-control" id="project-name" maxlength="20" required>
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <!-- New Team Modal-->
  <div class="modal fade" id="newTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New team</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-body">
          <form action="" id="new-team-form">
            <div class="form-group">
              <div id="result"></div>
              <label for="bug-title">Team name:</label>
              <input type="text" class="form-control" id="team-name" maxlength="40" required>
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
  <script src="js/bugs-projects.js"></script>
  <script src="js/bugs.js"></script>
  <script src="js/bugs-teams.js"></script>
  <script src="js/teams.js"></script>
  <script src="js/bugsSortable.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="https://kit.fontawesome.com/ff0f4c191d.js" crossorigin="anonymous"></script>
  <script src="v/jquery/jquery.min.js"></script>
  <script src="v/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="v/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>