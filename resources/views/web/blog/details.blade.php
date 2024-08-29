<x-app-layout>


    {{--
    <x-slot name="header">
        <section class="flex justify-between text-gray-800">
            <section class="flex flex-col">
                <h2 class="font-semibold text-3xl  leading-tight">{{ $blog->title }}</h2>
                <section>
                    <span>postado {{ $blog->created_at->diffForHumans() }}</span>
                </section>
            </section>

            <section class="p-4">
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" name="action" value="delete"
                        class="material-symbols-outlined text-2xl">delete</button>
                    <button type="submit" name="action" value="edit"
                        class="material-symbols-outlined  text-2xl">edit</button>
                </form>
            </section>
        </section>
    </x-slot> --}}

    <div class="">

        <div class="mb-4 bg-white overflow-hidden shadow-sm ">
            <section class="w-full h-96 overflow-hidden">
                <img class="object-cover" src="{{ Storage::url('templates/bg-blog.jpg') }}" alt="">
            </section>

            <div class="p-6 text-gray-900">

                <section>
                    <h1 class="text-3xl font-semibold">{{ $blog->title }}</h1>
                    <span>Postado {{ $blog->created_at->diffForHumans() }}</span>
                </section>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 pb-12">



            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <section class="flex flex-col gap-y-8">
                        @foreach ($blog->elements_groups as $group)
                            <section class="flex flex-col gap-y-2">


                                @foreach ($group->elements as $element)
                                    @switch($element->type)
                                        @case('title')
                                            <h2 class="text-2xl font-semibold">{{ $element->content }}</h2>
                                        @break

                                        @case('image')
                                            <div class="w-full h-96 overflow-hidden">
                                                <img class="object-cover w-full h-full"
                                                    src="{{ Storage::url($element->content) }}" alt="">
                                            </div>
                                        @break

                                        @case('content')
                                            <p class="text-justify text-lg">{{ $element->content }}</p>
                                        @break
                                    @endswitch

                                    {{-- <section class="flex flex-col gap-y-4 mt-2">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aperiam vero
                                            eligendi, blanditiis quibusdam, error aut eaque laboriosam voluptatum, fugit
                                            laborum assumenda rerum expedita delectus voluptatem quidem nulla ipsa
                                            dolore.
                                        </p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore aperiam vero
                                            eligendi, blanditiis quibusdam, error aut eaque laboriosam voluptatum, fugit
                                            laborum assumenda rerum expedita delectus voluptatem quidem nulla ipsa
                                            dolore.
                                        </p>
                                    </section> --}}


                                    {{-- @dd($element->content) --}}
                                @endforeach

                            </section>
                        @endforeach
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
