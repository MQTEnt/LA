<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
	<meta charset="UTF-8" />
	<meta name="copyright" content="QuocTuan.Info" />
	<meta name="author" content="Vũ Quốc Tuấn" />
	<title>Laravel 5.2 & Angular JS</title>
	<!-- Load Bootstrap CSS -->
	<link type="text/css" rel="stylesheet" href="template/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="template/css/style.css" />
</head>
<body>
	<div class="container" ng-controller="studentsCtrl">
		<center><h2>Danh Sách Sinh Viên</h2></center>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th width="30%">Họ và Tên</th>
					<th>Tuổi</th>
					<th>Điện thoại</th>
					<th>Email</th>
					<th width="10%"><button id="btn-add" class="btn btn-primary btn-xs" ng-click="myClick('add')">Thêm Sinh Viên</button></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="student in students">
					<td>{{student.id}}</td>
					<td>{{student.name}}</td>
					<td>{{nowYear-student.birth_year}}</td>
					<td>{{student.phone}}</td>
					<td>{{student.email}}</td>
					<td>
						<button class="btn btn-default btn-xs btn-detail" id="btn-edit" ng-click="myClick('edit',student.id)">Sửa</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(student.id)">Xóa</button>
					</td>
				</tr>
			</tbody>
		</table>
		
		<!-- Modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">{{titleModal}}</h4>
			  </div>
			  <div class="modal-body">
				<form name="myForm" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 control-label">Họ tên</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="name" ng-model="student.name" ng-required="true">
							<span ng-show="myForm.name.$error.required" class="help-block">Vui lòng nhập họ tên</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Năm sinh</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="birth_year" ng-model="student.birth_year" ng-required="true">
							<span ng-show="myForm.birth_year.$error.required" class="help-block">Vui lòng nhập năm sinh</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" name="email" ng-model="student.email" ng-required="true">
							<span ng-show="myForm.email.$error.required" class="help-block">Vui lòng nhập email</span>
							<span ng-show="myForm.email.$error.email" class="help-block">Email sai định dạng</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Điện thoại</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="phone" ng-model="student.phone" ng-required="true">
							<span ng-show="myForm.phone.$error.required" class="help-block">Vui lòng nhập điện thoại</span>
						</div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" ng-disabled="myForm.$invalid" ng-click="save(state,id)">Lưu</button>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

	<!-- Load Bootstrap JS -->
	<script type="text/javascript" src="template/js/jquery.min.js"></script>
	<script type="text/javascript" src="template/js/bootstrap.min.js"></script>
	<!-- Load AngularJS -->
	<script src="app/lib/angular.min.js"></script>
	<script src="app/app.js"></script>
</body>
</html>