<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Information</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

<body>
<div class="container mt-4">
        <div class="row mb-3">
            <div class="col text-right">
                <button type="button" class="btn btn-success mr-2">Deploy</button>
                <button type="button" class="btn btn-danger delete-all-btn">Delete All</button>
            </div>
        </div>
    <!-- <div class="container mt-4">
        <div class="delete-btn-container">
            <button type="button" class="btn btn-danger delete-all-btn">Delete All</button>
        </div> -->
        <div class="table-responsive"  >
        <table id="staffTable" class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Staff ID</th>
                        <th>Surname</th>
                        <th>Othernames</th>
                        <th>Gender</th>
                        <th>Current Role</th>
                        <th>Previous Feeder</th>
                        <th>Current Region</th>
                        <th>Current Department</th>
                        <th>New Role</th>
                        <th>New Feeder</th>
                        <th>New Region</th>
                        <th>Unit</th>
                        <th>New Department</th>
                        <th>Effective Deployment Date</th>
                        <th>Email</th>
                        <th>Current Reporting Line</th>
                        <th>Current Regional MIS Email</th>
                        <th>New Reporting Line Role</th>
                        <th>New Reporting Line Email</th>
                        <th>New Regional MIS Email</th>
                        <th>Redeployment Type</th>
                        <th>Relocation Allowance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deploy as $item)
                    <tr>
                        <td>{{$item->staffid}}</td>
                        <td>{{$item->surname}}</td>
                        <td>{{$item->othername}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->currentrole}}</td>
                        <td>{{$item->previousfeeder}}</td>
                        <td>{{$item->currentregion}}</td>
                        <td>{{$item->currentdepartment}}</td>
                        <td>{{$item->newrole}}</td>
                        <td>{{$item->newfeeder}}</td>
                        <td>{{$item->newregion}}</td>
                        <td>{{$item->unit}}</td>
                        <td>{{$item->newdepartment}}</td>
                        <td>{{$item->effectivedeploymentdate}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->currentreportingline}}</td>
                        <td>{{$item->currentregionalmisemail}}</td>
                        <td>{{$item->newreportinglinerole}}</td>
                        <td>{{$item->newreportinglineemail}}</td>
                        <td>{{$item->newregionalmisemail}}</td>
                        <td>{{$item->redeploymenttype}}</td>
                        <td>{{$item->relocationallowance}}</td>
                        <td>
                            <button type="button" class="btn btn-success mx-2 edit-btn" data-id="{{$item->id}}" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button type="button" class="btn btn-success mx-2 deploy-btn" data-id="{{$item->id}}"  data-target="#staffTable">Deploy</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        <!-- Modal for editing staff information -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Staff Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing staff information -->
                    <form id="editForm">
                        <div class="form-group">
                            <label for="newrole">New Role</label>
                            <input type="text" class="form-control" id="newrole" name="newrole">
                        </div>
                        <div class="form-group">
                            <label for="newfeeder">New Feeder</label>
                            <input type="text" class="form-control" id="newfeeder" name="newfeeder">
                        </div>
                        <div class="form-group">
                            <label for="newregion">New Region</label>
                            <input type="text" class="form-control" id="newregion" name="newregion">
                        </div>
                        <div class="form-group">
                            <label for="newdepartment">New Department </label>
                            <input type="text" class="form-control" id="newdepartment" name="newdepartment">
                        </div>
                        <div class="form-group">
                            <label for="newreportinglinerole">New Reporting Line Role</label>
                            <input type="text" class="form-control" id="newreportinglinerole" name="newreportinglinerole">
                        </div>
                        <div class="form-group">
                            <label for="newreportinglineemail">New Reporting Line Email</label>
                            <input type="text" class="form-control" id="newreportinglineemail" name="newreportinglineemail">
                        </div>
                        <div class="form-group">
                            <label for="newregionalmisemail">New Regional MIS Email</label>
                            <input type="text" class="form-control" id="newregionalmisemail" name="newregionalmisemail">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS (optional, for dropdowns, modals, etc.) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script src="../js/edit.js"></script>
    <script src="../js/delete.js"></script>
    <script src="../js/sendmail.js"></script>
        



