<x-header data="Update User">

    

    <form action="updateUser" method="POST">
    @csrf

        <input type="hidden" name="id"  value="{{$data->id}}">
        <input type="text" name="name"  value="{{ $data->name }}" >

        <input type="email" name="email"  value="{{ $data->email }}" >

        
        <input type="password" name="password"  value="{{ $data->password }}" >

        <!-- 
        <label for="contact_number">Contact Number</label>
        <input type="tel" name="contact_number" id="contact_number" value="{{ $data->contact_number }}" > -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
