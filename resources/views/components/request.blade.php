<div class="my-2 shadow text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{$requestname}}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{$requestemail}}</td>
      <td class="align-middle">
    </table>
    <div>
      @if ($mode == 'pending')
          <form action="{{ route('with_draw_request') }}" method="POST">
            @csrf
            <input type="hidden" name="with_draw_id" value="{{ $receiverid }}">
            <button id="cancel_request_btn_" class="btn btn-danger me-1"
            onclick="">Withdraw Request </button>
            </form>
      @else
      <form action="{{ route('change-status') }}" method="POST">
        @csrf
        <input type="hidden" name="receive_id" value="{{ $id }}">
         <button id="accept_request_btn_" class="btn btn-primary me-1"
          onclick="">Accept</button>
        </form>
      @endif
    </div>
  </div>
</div>
