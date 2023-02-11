<div>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form wire:submit.prevent="destroyCategory">
      <div class="modal-body">
        <h6> Are you sure you want to delete this data?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes. Delete</button>
      </div>
      </form>

    </div>
  </div>
</div>


<div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
        <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">

                @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
                @endif
                
                <div class="card">
                <div class="card-header">
                    <h3> Category
                    
                    <a href="{{url('create')}}" class="btn btn-primary btn-sm float-end"> Add Category</button></a>
                    
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped:">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('category/'.$category->id.'/edit')}}" class="btn btn-success">Edit</a>  
                                <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <div>
                    {{ $categories->links()}}
                    </div>
                   
                </div>
            </div>
                  
                </div> 
              </div>
            
            </div>
        </div>
        </main>
        </div>
        </div>