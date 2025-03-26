"use client"

import React from 'react'
import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'

import 'swiper/css/bundle'
import {Swiper, SwiperSlide} from 'swiper/react'
import {Autoplay,Navigation,Pagination} from "swiper/modules"

const Slider = () => {
    return (
        <>
            <div className='slider-block'>
                {/* left arrow */}
                <div className='prev-arrow items-center justify-center'>
                    <Icon.CaretLeft className='text-white heading6' weight='bold'/>
                </div>

                {/* slider */}
                <div className='slider-main'>
                    <Swiper
                        spaceBetween={0}
                        slidesPerView={1}
                        navigation={{
                            prevEl: '.prev-arrow',
                            nextEl: '.next-arrow'
                        }}
                        loop={true}
                        pagination={{ clickable: true }}
                        speed={400}
                        modules={[Pagination,Autoplay,Navigation]}
                        className='h-full relative'
                        autoplay={{
                            delay: 4000
                        }}
                    >
                        <SwiperSlide>
                            <div className='slider-item slider-first'>
                                <div className='bg-img'>
                                    <Image
                                        src="/slider/one.jpg"
                                        width={4000}
                                        height={3000}
                                        alt=">Lorem ipsum dolor sit"
                                        priority={true}
                                        className='w-full h-full object-cover'
                                    /> 
                                </div>
                            
                                <div className='container'>
                                    <div className='text-content flex-column-between'>
                                        <div className='heading2'>
                                            <div className='relative overflow-hidden'>
                                                <span className='block relative overflow-hidden'>Lorem, ipsum.</span>
                                                <span className='block absolute top-0 left-0 w-full h-full'>Lorem, ipsum.</span>
                                            </div> 
                                        </div>

                                        <div className='body2 mt-3 text-secondary'>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque exercitationem eos est nulla quam libero culpa labore.
                                        </div>

                                        <div className='button-block md:mt-10 mt-6'>
                                            <Link className='button-main bg-blue-700 text-white hover:bg-blue-500' href="/"> 
                                                Discovery Now 
                                            </Link> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </SwiperSlide>

                        <SwiperSlide>
                            <div className='slider-item slider-first'>
                                <div className='bg-img'>
                                    <Image
                                        src="/slider/two.jpg"
                                        width={4000}
                                        height={3000}
                                        alt=">Lorem ipsum dolor sit"
                                        priority={true}
                                        className='w-full h-full object-cover'
                                    /> 
                                </div>
                            
                                <div className='container'>
                                    <div className='text-content flex-column-between'>
                                        <div className='heading2'>
                                            <div className='relative overflow-hidden'>
                                                <span className='block relative overflow-hidden'>Lorem, ipsum.</span>
                                                <span className='block absolute top-0 left-0 w-full h-full'>Lorem ipsum.</span>
                                            </div> 
                                        </div>

                                        <div className='body2 mt-3 text-secondary'>
                                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque exercitationem eos est nulla quam libero culpa labore.
                                        </div>

                                        <div className='button-block md:mt-10 mt-6'>
                                            <Link className='button-main bg-blue-700 text-white hover:bg-blue-500' href="/"> 
                                                Discovery Now 
                                            </Link> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </SwiperSlide>
                    </Swiper>
                </div>

                {/* right arrow */}
                <div className='next-arrow items-center justify-center'>
                    <Icon.CaretRight className='text-white heading6' weight='bold'/>
                </div>
            </div>
        </>
    );
};

export default Slider;