import React from 'react'    

import Image from 'next/image'
import Link from 'next/link'
import * as Icon from '@phosphor-icons/react/dist/ssr'
import 'swiper/css/bundle'
import {Swiper, SwiperSlide} from 'swiper/react'
import {Autoplay,Navigation,Pagination} from "swiper/modules"
import { URL_IMG } from '@/config/config'

const Slider = ({data}) => {

    return <div className='slider-block'>
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
                {data.data.map((item,i) => (
                    <SwiperSlide key={i}>
                        <div className='slider-item slider-first'>
                            <div className='bg-img'>
                                <Image
                                    src={`${URL_IMG}/slider/${item.image}`}
                                    width={4000}
                                    height={3000}
                                    alt={item.title}
                                    priority={true}
                                    className='w-full h-full object-cover'
                                /> 
                            </div>
                        
                            <div className='container'>
                                <div className='text-content flex-column-between'>
                                    <div className='heading2'>
                                        <div className='relative overflow-hidden'>
                                            <span className='block relative overflow-hidden'>{item.title}</span>
                                            <span className='block absolute top-0 left-0 w-full h-full'>{item.title}</span>
                                        </div> 
                                    </div>

                                    <div className='body2 mt-3 text-secondary'>{item.desc}</div>

                                    <div className='button-block md:mt-10 mt-6'>
                                        <Link className='button-main bg-blue-700 text-white hover:bg-blue-500' href="/"> 
                                            Discovery Now 
                                        </Link> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </SwiperSlide>
                ))}
            </Swiper>
        </div>

        {/* right arrow */}
        <div className='next-arrow items-center justify-center'>
            <Icon.CaretRight className='text-white heading6' weight='bold'/>
        </div>
    </div>
};

export default Slider;