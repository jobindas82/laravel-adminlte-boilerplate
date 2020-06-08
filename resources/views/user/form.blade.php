<form id="user-form">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" id="user_id" value="{{ $model->exists ? $model->id : '' }}">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter full name.." value="{{ $model->exists ? $model->name : old('name') }}" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter user email.." value="{{ $model->exists ? $model->email : old('email') }}" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter a strong password..">
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit-validator">Save</button>
    </div>
</form>