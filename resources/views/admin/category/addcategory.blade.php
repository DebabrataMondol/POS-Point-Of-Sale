@extends('admin.base')

@section('content')

    <div class="content-wrapper">
<button style="margin-left: 85%;margin-bottom: 11px;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add New Categroy</button>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header">
          Add Category
        </div>
          <form  id="add_brand" method="post" action="{{route('addcategroy')}}" enctype="multipart/form-data">
                @csrf
         <div class="modal-body">
			
			<div class="col-sm-12">
			     <div class="form-group">
			      <label for="name">Category Name</label>
			      <input type="text" class="form-control" id="name" name="category_name" placeholder="Category Name">
			      <span class="text-danger">{{$errors->has('category_name')? $errors->first('category_name'):''}}</span>
			    </div>
			  </div>

			  <div class="col-sm-12">
			     <div class="form-group">
			      <label for="name">Status</label>
			      <div class="radio">
			      	<label><input type="radio" value="1" name="status" checked="" >Active</label>
			      	<label><input type="radio" value="0" name="status">Inactive</label>
    			</div>
			    </div>
			  </div>
          
        </div>
			<button type="submit" style="margin-bottom: 24px;" class="btn btn-info btn-block">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>



      <div class="ibox-body">
          <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
              <thead>
                  <tr>
                     <th>SL</th> 
                     <th>Group Name</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
              </thead>
            
                  
              
              <tbody>
              	@php($i=1)
				@foreach ($categorys as $category)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$category->category_name}}</td>
                     <td>
                     	@if ($category->status==1)
                     		Active
                     	@elseif($category->status==0)
                     		Inactive
                     	@endif
                     </td>
                     <td>
                      
                      @if ($category->status==1)
                      	<a href="{{route('categorystatus',['id'=>$category->id])}}" class="btn btn-info btn-xs" title="status">
                          <span class="fa fa-arrow-up"></span>
                          </a>
                       @elseif($category->status==0)
                     		<a href="{{route('categorystatus',['id'=>$category->id])}}" class="btn btn-warning btn-xs" title="status">
                            <span class="fa fa-arrow-down"></span>
                            </a>
                      @endif

             			<a href="{{route('categoryedit',['id'=>$category->id])}}" class="btn btn-success btn-xs" title="Edit">
             				<span class="fa fa-pencil-square-o"></span>
             			</a>

             			<a id="delete-button" href="{{route('categorydelete',['id'=>$category->id])}}" class="btn btn-danger btn-xs" title="Delete">
             				<span class="fa fa-trash"></span>
             			</a>
                     </td>
                  </tr>
				@endforeach
          
                
              </tbody>
          </table>
      </div> 



</div>
@endsection