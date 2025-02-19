<x-home-layout>
    @section('title')
    About
@endsection
    @include('components.subheader-bg')

    <div class="2xl:container 2xl:mx-auto lg:py-16 lg:px-20 md:py-12 md:px-6 py-9 px-4">
        <div class="flex flex-col lg:flex-row justify-between gap-8">
            <div class="w-full lg:w-5/12 flex flex-col justify-center">
                <h1 class="text-2xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">About Us</h1>
                <p class="font-normal text-base leading-6 text-gray-600 dark:text-white">It is a long established fact
                    that a reader will be distracted by the readable content of a page when looking at its layout. The
                    point of using Lorem Ipsum.In the first place we have granted to God, and by this our present
                    charter confirmed for us and our heirs forever that the English Church shall be free, and shall have
                    her rights entire, and her liberties inviolate; and we will that it be thus observed; which is
                    apparent from</p>
            </div>
            <div class="w-full lg:w-8/12">
                <img class="w-full h-full shadow-lg rounded-lg"
                    src="https://5.imimg.com/data5/SELLER/Default/2022/12/GT/XH/CW/2451824/cricket-turf.jpg"
                    alt="A group of People" />
            </div>
        </div>

        <div class="flex lg:flex-row flex-col justify-between gap-8 pt-12">
            <div class="w-full lg:w-5/12 flex flex-col justify-center">
                <h1 class="text-2xl lg:text-4xl font-bold leading-9 text-gray-800 dark:text-white pb-4">Our Story</h1>
                <p class="font-normal text-base leading-6 text-gray-600 dark:text-white">It is a long established fact
                    that a reader will be distracted by the readable content of a page when looking at its layout. The
                    point of using Lorem Ipsum.In the first place we have granted to God, and by this our present
                    charter confirmed for us and our heirs forever that the English Church shall be free, and shall have
                    her rights entire, and her liberties inviolate; and we will that it be thus observed; which is
                    apparent from</p>
            </div>
            <div class="w-full lg:w-8/12 lg:pt-8">
                <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 lg:gap-4 shadow-lg rounded-md">
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class="md:block hidden"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Alexa featured Image" />
                        <img class="md:hidden block"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Alexa featured Image" />
                        <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Alexa</p>
                    </div>
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class="md:block hidden"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Olivia featured Image" />
                        <img class="md:hidden block"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Olivia featured Image" />
                        <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Olivia</p>
                    </div>
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class="md:block hidden"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Liam featued Image" />
                        <img class="md:hidden block"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Liam featued Image" />
                        <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Liam</p>
                    </div>
                    <div class="p-4 pb-6 flex justify-center flex-col items-center">
                        <img class="md:block hidden"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Elijah featured image" />
                        <img class="md:hidden block"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDusGp4e9OpSMrBUQqFucZYcM1QDotx4WHtw&usqp=CAU"
                            alt="Elijah featured image" />
                        <p class="font-medium text-xl leading-5 text-gray-800 dark:text-white mt-4">Elijah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-home-layout>
