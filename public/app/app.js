var app=angular.module('myApp',[]);
app.controller('studentsCtrl',function($scope, $http){
	//Lấy dữ liệu danh sách
	$http.get('list').success(function(dataFormServer){
		$scope.nowYear= new Date().getFullYear();
		$scope.students=dataFormServer;
	});
	$scope.myClick=function(state,id){
		$scope.state=state; //Lấy trạng thái khi click để truyền vào hàm save() tại view
		switch(state)
		{
			case 'add': 
			$scope.titleModal='Thêm sinh viên';
			break;
			case 'edit':
			$scope.titleModal='Sửa sinh viên';
			$scope.id=id; //Lấy id để đẩy lại sang hàm save()
			//Get data của model từ server
			$http.get('edit/'+id).success(function(dataFormServer){
				$scope.student=dataFormServer; //Model student vẫn giống như lúc Add
			});
			break;
		}
		//console.log(id);
		//Hiển thị popup
		$('#myModal').modal('show');
	};

	//Sử lý sự kiện click button Lưu
	$scope.save=function(state, id){ //Thêm id để phục vụ phần Edit
		//Create
		if(state=='add')
		{
			var data=$.param($scope.student); //*** Tạo biến data chứa dữ liệu được lấy từ form để gửi tới server
			$http({
				method: 'POST',
				url: '/add',
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(response){
				console.log(response);
				location.reload();
			}).error(function(response){
				console.log(response);
				alert('Error');
			});
		}
		//Store
		if(state=='edit')
		{
			var data=$.param($scope.student);
			$http({
				method: 'POST',
				url: '/edit/'+id,
				data: data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			})
			.success(function(response){
				console.log(response);
				location.reload();
			}).error(function(response){
				console.log(response);
				alert('Error');
			});
		}
	};

	$scope.confirmDelete=function(id){
		var isConfirmDelete=confirm('Are you sure to delete?');
		if(isConfirmDelete)
		{
			$http.get('delete/'+id)
			.success(function(){
				alert('Delete Success ID '+id);
				location.reload();
			})
			.error(function(){
				alert('Error');
			});
		}
		else
		{
			return false;
		}
	}
});