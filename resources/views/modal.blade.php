<!-- Modal -->
<div class="modal fade" id="store_or_update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header py-2">
          <h5 class="modal-title" id="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" id="store_or_update_form" enctype="multipart/form-data">
                @csrf

                <x-form.inputbox name="name" labelName="Name" required="required" placeholder="Enter name"/>
                <x-form.inputbox type="email" name="email" labelName="Email" required="required" placeholder="Enter email"/>
                <x-form.inputbox name="mobile_no" labelName="Mobile No" placeholder="Enter mobile no"/>
                <x-form.selectbox name="status" labelName="Status" required="required">
                    <option value="">Select Please</option>
                    <option value="1">Active</option>
                    <option value="2">Inactive</option>
                </x-form.selectbox>
                <x-form.inputbox type="file" name="image" labelName="Profile"/>
            </form>
        </div>
        <div class="modal-footer py-2">
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary" id="save-btn"></button>
        </div>
      </div>
    </div>
  </div>
