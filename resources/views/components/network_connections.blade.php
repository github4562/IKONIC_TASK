<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card shadow  text-white bg-dark">
            <div class="card-header">Coding Challenge - Network connections</div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="btn-group w-25 " role="presentation">
                        <button class="btn btn-outline-primary" id="suggestion-tab" data-bs-toggle="tab"
                            data-bs-target="#suggestion" type="button" role="tab" aria-controls="suggestion"
                            aria-selected="true">Suggestions ( {{count($suggested)}} )</button>
                    </li>
                    <li class="btn-group w-25 " role="presentation">
                        <button class="btn btn-outline-primary" id="send-tab" data-bs-toggle="tab"
                            data-bs-target="#send" type="button" role="tab" aria-controls="send"
                            aria-selected="false">Sent Requests ( {{count($requested)}} )</button>
                    </li>
                    <li class="btn-group w-25 " role="presentation">
                        <button class="btn btn-outline-primary" id="receive-tab" data-bs-toggle="tab"
                            data-bs-target="#receive" type="button" role="tab" aria-controls="receive"
                            aria-selected="false">Received
                            Requests( {{count($received)}} )</button>
                    </li>
                    <li class="btn-group w-25 " role="presentation">
                        <button class="btn btn-outline-primary" id="connection-tab" data-bs-toggle="tab"
                            data-bs-target="#connection" type="button" role="tab" aria-controls="connection"
                            aria-selected="false">Connections
                            ( {{count($connectioned)}} )</button>
                    </li>
                </ul>


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="suggestion" role="tabpanel"
                        aria-labelledby="suggestion-tab">
                        @foreach ($suggested as $suggest)
                            <x-suggestion :name="$suggest->name" :email="$suggest->email" :id="$suggest->id" />
                        @endforeach
                    </div>


                    <div class="tab-pane fade" id="send" role="tabpanel" aria-labelledby="send-tab">
                        {{-- {{$requested}} --}}
                        @foreach ($requested as $requeste)
                            <x-request :mode="$requeste->status" :requestname="$requeste->sendUser->name" :requestemail="$requeste->sendUser->email" :receiverid="$requeste->connection_id" />
                        @endforeach
                    </div>


                    <div class="tab-pane fade" id="receive" role="tabpanel" aria-labelledby="receive-tab">
                        {{-- {{$received}} --}}
                        @foreach ($received as $receive)
                            <x-request :mode="'received'" :requestname="$receive->receivedUser->name" :requestemail="$receive->receivedUser->email" :id="$receive->connection_id" />
                        @endforeach
                    </div>


                    <div class="tab-pane fade" id="connection" role="tabpanel" aria-labelledby="connection-tab">
                        {{-- {{$connectioned}} --}}
                        @foreach ($connectioned as $connection)
                            <x-connection  :connectedname="$connection" :id="$connection->connection_id"  />
                        @endforeach

                        <div id="skeleton" class="d-none">
                            @for ($i = 0; $i < 10; $i++)
                                <x-skeleton />
                            @endfor
                        </div>

                        <span class="fw-bold">"Load more"-Button</span>
                        <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
                            <button class="btn btn-primary" onclick="" id="load_more_btn">Load more</button>
                        </div>

                    </div>


                </div>
                <hr>
                <div id="content" class="d-none">
                    {{-- Display data here --}}
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Remove this when you start working, just to show you the different components --}}

<div id="connections_in_common_skeleton" class="{{-- d-none --}}">
    <br>
    <span class="fw-bold text-white">Loading Skeletons</span>
    <div class="px-2">
        @for ($i = 0; $i < 10; $i++)
            <x-skeleton />
        @endfor
    </div>
</div>
