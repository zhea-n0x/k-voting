@extends('layout.master')
    @section('wrapper')
    {{-- <div class="h-screen lg:h-full text-gray-800">
        <div class="flex justify-between items-center  lg:h-full">
            <div class="w-10 xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12  mb-12 md:mb-0 px-12 pr-20">
                <form action="{{ url('/auth/login') }}" method="POST">
                    @csrf
                    <div class="flex flex-col lg:justify-start gap-3 mb-10">
                        <img src="{{ asset('logo.png') }}" alt="K-PIRA" class="w-20 h-20">
                        <div class="text">
                            <p class="text-3xl font-bold tracking-wider text-red-600">Hello, There !</p>
                            <p class="text-md text-slate-500">use your e-learning identity to start session</p>
                        </div>
                    </div>

                    <div class="form-container">
                        <!-- Email input -->
                        <div class="mb-6 gap-2 flex flex-col">
                            <label for="" class="font-semibold text-lg">Username</label>
                            <input type="text"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="user.331190XXXX" name="username" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-6 gap-2 flex flex-col">
                            <label for="" class="font-semibold text-lg">Password</label>
                            <input type="password"
                                class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none"
                                id="exampleFormControlInput2" placeholder="Password" name="password"/>
                        </div>
                    </div>


                    <div class="text-center lg:text-left mt-14">
                        <button type="submit"
                            class="inline-block px-7 py-3 bg-red-600 text-white font-medium text-md leading-snug  rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out w-full">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
            <div class="xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0 min-h-screen lg:block hidden ">
                {{-- <img src=""
                        class="w-full" alt="Sample image" /> --}}
                {{-- import image from resources/css --}}
                {{--  " class="w-full h-full object-cover" alt="Sample image" />
            </div>

        </div>
    </div> --}}
    <div class="lg:flex">
        <div class="max-w-screen-sm -ml-32 lg:-ml-0 lg:w-1/2 xl:max-w-screen-sm">
            <div class="py-12 lg:bg-white flex justify-center lg:justify-start lg:px-16 lg:ml-10">
                <div class="cursor-pointer flex items-center">
                    <div>
                        <img src="{{ asset('logo.png') }}" alt="K-PIRA" class="w-10 h-10">
                    </div>
                    <div class="text-2xl text-red-600 tracking-wide ml-2 font-semibold">K-PIRA</div>
                </div>
            </div>
            <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-8 xl:px-24 xl:max-w-2xl">
                <p class="text-3xl font-bold tracking-wider text-red-600">Hello, There !</p>
                            <p class="text-md text-slate-500">use your e-learning identity to start session</p>
                <div class="mt-12">
                    <form action="{{ url('/auth/login') }}" method="POST">
                        @csrf
                        <div>
                            <div class="text-sm font-bold text-gray-700 tracking-wide">Username</div>
                            <input class="w-full text-lg py-2 rounded-md border-b border-gray-300 focus:outline-none focus:border-indigo-500 mt-2" type="text"  name="username" placeholder="user.33xxxxxxxx">
                        </div>
                        <div class="mt-8">
                            <div class="flex justify-between items-center">
                                <div class="text-sm font-bold text-gray-700 tracking-wide">
                                    Password
                                </div>
                            </div>
                            <input class="w-full mt-2 rounded-md text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="mt-10">
                            <button class="bg-red-600 text-gray-100 p-4 w-full rounded-lg tracking-wide
                            font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-red-700
                            shadow-lg">
                                Log In
                            </button>
                        </div>
                    </form>
                    {{-- <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                        Don't have an account ? <a class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="hidden lg:flex items-center justify-center bg-custom bg-cover flex-1 h-screen">
        </div>
    </div>
    @endsection
