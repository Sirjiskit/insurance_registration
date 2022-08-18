@php
$state = ['Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue', 'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu', 'FCT - Abuja', 'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina', 'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo', 'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara'];
@endphp
<section>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Information</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('profile.update') }}" id="form-profile"
                            method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>First Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" required name="firstName" class="form-control"
                                                    value="{{ @$data->firstName }}" placeholder="First Name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Last Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" required name="lastName" class="form-control"
                                                    value="{{ @$data->lastName }}" placeholder="Last Name">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" readonly id="email-id" class="form-control"
                                                    value="{{ @$data->email }}" placeholder="Email">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Mobile</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" required
                                                    pattern="^(080|090|070|081|091)+[0-9]{8}$" name="phone"
                                                    class="form-control" placeholder="Mobile"
                                                    value="{{ @$data->phone }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="address" required class="form-control" placeholder="Address">{{ @$data->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Address 2</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="address2" class="form-control" placeholder="Address 2">{{ @$data->address2 }}</textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>State</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select class="form-control" required name="state">
                                                    <option value="">Choose..</option>
                                                    @foreach (@$state as $x)
                                                        <option {{ @$data->state == $x ? 'selected' : '' }}
                                                            value="{{ @$x }}">{{ @$x }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>City</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="City" required class="form-control"
                                                    name="City" value="{{ @$data->City }}" placeholder="City">
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
