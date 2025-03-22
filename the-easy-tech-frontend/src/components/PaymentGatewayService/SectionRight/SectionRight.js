"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'
import * as Icon from '@phosphor-icons/react/dist/ssr'

const SectionRight = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='w-11/12 xl:w-7/12'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='right pl-10'>
            <div className='bg-img'>
                <Image width={5000} height={5000} className='w-full' src="/gateway2-bg.webp" alt='image' /> 
            </div>
            <div className='feature-item py-4 px-6 rounded-2xl bg-white inline-flex items-center gap-4 box-shadow'>
                <i className='icon-list text-2xl p-4 rounded-2xl bg-red-400'></i>
                <div className='text'>
                    <div className='heading7'>Lorem, ipsum. K+</div>
                    <div className='heading7 text-secondary'>Projects</div> 
                </div> 
            </div>
            <div className='feature-item py-4 px-6 rounded-2xl bg-white inline-flex items-center gap-4 box-shadow'>
                <Icon.Star weight='fill' className='text-yellow-600 text-3xl'/>
                <div className='text'>
                    <div className='heading7'>Lorem, ipsum dolor.</div>
                    <div className='heading7 text-secondary'>Satisfaction</div>
                </div> 
            </div>
            <div className='feature-item py-4 px-6 rounded-2xl bg-white inline-flex items-center gap-4 box-shadow'>
                <i className='icon-user text-2xl p-4 rounded-2xl bg-red-600'></i>
                <div className='text'>
                    <div className='heading7'>Years</div>
                    <div className='heading7 text-secondary'>Product Designer</div> 
                </div> 
            </div>
        </div>
    </div>
};

export default SectionRight;