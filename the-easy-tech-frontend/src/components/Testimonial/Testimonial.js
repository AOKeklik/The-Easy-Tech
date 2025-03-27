"use client"
import React, { useEffect, useState } from 'react'  

import 'swiper/css/bundle'
import {Swiper, SwiperSlide} from 'swiper/react'
import {Autoplay,Navigation,Pagination} from "swiper/modules"

import Loader from '@/components/Loader/Loader'

import testimonial from "@/data/testimonial.json"

const Testimonials = () => {
    const [data, setData] = useState([])
    const [loading, setLoading] = useState(true)

    useEffect(() => {
        const fetch = async () => {
            try{
                setLoading(true)

                await new Promise(resolve=>setTimeout(resolve, 1000))
                await setData(testimonial)

            } catch(err){
                console.log(err)
            }finally{
                setLoading(false)
            }
        }
        fetch()
    }, [])

    return loading ? (
        <Loader />
    ) : ( <div className='testimonial-block bg-slate-100'>
        <div className='container'>
            <div className='testimonial-main bg-surface lg:pt-20 sm:pt-16 pt-10 lg:pb-12 pb-8 sm:my-16 my-10 lg:rounded-[40px] rounded-2xl flex items-center justify-center'>
                <div className='content sm:w-2/3 w-[85%]'>
                    <div className='heading3 text-center'>Trusted By Professionals</div>
                    <Swiper
                        spaceBetween={16}
                        slidesPerView={1} 
                        loop={true}
                        pagination={{ clickable: true }}
                        speed={400}
                        modules={[Pagination,Autoplay,Navigation]}
                        className='h-full relative lg:mt-10 mt-7'
                        autoplay={{
                            delay: 4000
                        }}
                    >
                        {data.map((item,i) => (
                            <SwiperSlide key={i} className='lg:pb-24 pb-20'>
                                <div className='text-2xl font-medium text-center'>{item.desc}</div>
                                <div className='text-button text-center mt-5'>{item.author}</div> 
                            </SwiperSlide>
                        ))}
                    </Swiper>   
                </div>
            </div>
        </div>
    </div>)
};

export default Testimonials;