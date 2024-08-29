<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <x-slot name="script">
        <script src="{{ asset('js/blog-events.js') }}"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="flex flex-col mb-5">
                            <span class="text-lg font-semibold">Nome do Blog</span>
                            <input type="text" placeholder="Olá mundo" name="title" class="border-0 border-b appearance-none focus:ring-0">

                        </div>

                        <div id="elements" class="flex flex-col gap-y-5"></div>

                       <div class="static">
                            <section class="fixed right-5 bottom-5">
                                <button type="submit" class="border p-4 bg-gray-700 text-white font-semibold rounded-xl">Publicar</button>
                            </section>
                       </div>
                    </form>

                    <div class="flex gap-5 justify-center">
                        <button onclick="newElement()" class="border p-2 rounded-full text-center mt-4 material-symbols-outlined hover:scale-[1.1] transition duration-300 ease-in-out">add</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
