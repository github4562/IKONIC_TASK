<div class="my-2 shadow  text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{$name}}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{$email}}</td>
      <td class="align-middle">
    </table>
    <div>
        <form action="{{ route('send_request') }}" method="POST">
            @csrf
            <input type="hidden" name="auth_id" value="{{ $id }}">
            <button id="create_request_btn_" class="btn btn-primary me-1" @if(check($id) == true) disabled @else '' @endif> @if(check($id) == true) Connected @else Connect @endif</button>
        </form>
    </div>
  </div>
</div>
