@extends('web.pages.dashboard.app.app')
@section('user-body')
<div class="container">
    <!-- Dashboard Info Start -->
    <div class="dashboard-info">
        <div class="container">
            <div class="dashboard-user">
                <div class="dashboard__content">
                    <div class="row pb-4 mb-2">
                        <div class="col-auto">
                            <h1 class="text-30 lh-12 fw-bold text-dark">Messages</h1>
                        </div>
                    </div>
                    <div class="row y-gap-30">
                        <div class="col-xl-4">
                            <div class="rounded-16 bg-white dark-bg-dark-1 shadow-4 h-100">
                                <div class="d-flex items-center py-3 px-4 border-bottom-light">
                                    <h2 class="text-17 lh-1 fw-500">Chats</h2>
                                </div>
                                <div class="py-3 px-4">
                                    <div class="y-gap-30">
                                        @foreach ($instructorCourses as $item)
                                        <div class="d-flex justify-between">

                                            <a href="{{ route('chat.show.instructor',$item->id) }}">
                                                <div class="d-flex items-center">

                                                    <div class="shrink-0">
                                                        <img src="{{ asset('uploads') }}/courses/{{ $item->image }}" style="height: 25px" alt="image"
                                                          class="size-50">
                                                    </div>
                                                    <div class="ml-10">
                                                        <div class="text-14 lh-11 mt-5">{{ $item->title }}</div>
                                                    </div>

                                                </div>
                                            </a>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            @if ($course)
                            <div class="rounded-16 bg-white dark-bg-dark-1 shadow-4 h-100">
                                <div class="d-flex items-center justify-between py-3 px-4 border-bottom-light bg-dark">
                                    <div class="d-flex items-center">
                                        <div class="shrink-0">
                                            <img src="{{ asset('uploads/courses/' . $course->image) }}" alt="image" class="size-50 rounded-circle mr-2" style="height: 30px">
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-17 lh-11 fw-500 text-light">{{ $course->title }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-3 px-4">
                                    @if ($chats)
                                    <div class="row y-gap-20">
                                        @foreach ($chats as $chat)
                                        @php
                                        $senderInfo = $chat->sender_role == 2 ? App\Models\User::find($chat->sender_id) : ($chat->sender_role == 0 ? 'Moderator' : App\Models\User::find($chat->sender_id));
                                        @endphp
                                        <div class="
                                        @if ($chat->sender_role == 1) col-xl-7 col-lg-10
        @elseif($chat->sender_role == 0)
        col-xl-12
        @else
        col-xl-7 offset-xl-5 col-lg-10 offset-lg-2 @endif

                                        ">
                                        <div
                                        class="box m-2
@if ($chat->sender_role == 1) bg-info
@elseif($chat->sender_role == 0)
bg-dark text-light
@else
bg-light @endif
m-2
">
                                            <small class="border-bootom-dark mx-auto text-center ml-3">
                                                {{ $chat->created_at->format('d M h:i:a') }}
                                            </small>
                                            <div class="d-flex items-center">
                                                <div class="shrink-0">
                                                    @if ($chat->sender_role == 2)
                                                    <img src="{{ asset('uploads/instructors/' . $senderInfo->instructor->image) }}" alt="image" class="size-50 rounded-circle" style="height: 20px">
                                                    @elseif ($chat->sender_role == 0)
                                                    <!-- Moderator -->
                                                    @else
                                                    <img src="{{ asset('uploads/customers/' . $senderInfo->customer->image) }}" alt="image" class="size-50 rounded-circle" style="height: 20px">
                                                    @endif
                                                </div>
                                                <div class="ml-3 lh-11 fw-500 text-dark">
                                                    {{ $chat->sender_role == 0 ? 'Moderator' : $senderInfo->name }}
                                                </div>
                                            </div>
                                            <div class="d-block mt-2">
                                                <div class="py-3 px-4 rounded-8 {{ $chat->sender_role == 0 ? 'bg-dark-1 text-white' : ($chat->sender_id == Auth::user()->id ? 'bg-light-7 text-purple-1 text-right' : 'bg-light-3') }}">
                                                    {{ $chat->text }}
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="py-3 px-4 border-top-light">
                                    <div class="row y-gap-3 justify-between">
                                        <form action="{{ route('chat.save') }}" method="POST" class="d-flex w-100 align-items-center">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="sender_role" value="{{ Auth::user()->role }}">
                                            <div class="col-lg-7">
                                                <input class="form-control py-2" type="text" name="text" placeholder="Type a Message">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary text-white">Send Message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard Info End -->
</div>
@endsection
