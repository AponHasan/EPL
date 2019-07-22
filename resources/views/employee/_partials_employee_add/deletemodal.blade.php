<!-- Modal -->

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red;color:#fff">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('employee.delete','test')}}"method="POST">
            {{method_field('delete')}}
            @csrf
      <div class="modal-body" >
        <p>Are You sure...!  You want to delete this user record...?</p> 
        <!-- <input type="disable" class="form-control" id="mtitle" name="id"> -->
        <input type="hidden" class="form-control" id="mid" name="id">
      </div>
      <div class="modal-footer" align="center">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">No Cancle</button>
        <button type="submit" class="btn btn-danger btn-sm">Yes Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>