<div class="container mt-4">
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                            <label for="name">Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone" placeholder="Phone">
                            <label for="phone">Phone</label>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="userData btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <div class="card">
    <div class="card-header">
        <div class="row">
            <h5>Featured
                <a href="" class="btn btn-info float-end px-4" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
            </h5>
        </div>
    </div>
    <div class="card-body">
        
    </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(document).on("click", ".userData", function(){
            alert("Hello");
        });
    }); 
    
</script>