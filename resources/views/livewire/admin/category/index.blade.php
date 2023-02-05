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
                    
                    <a href="{{url('create')}}"> <button class="" style="float: right;" > Add Category</button></a>
                    
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
                                <a href="" class="btn btn-danger">Delete</a>
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