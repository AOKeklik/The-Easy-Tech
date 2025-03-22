"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'

const SectionLeft = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX(-60px)",
            opacity:isInView ? 1 : 0,
        }}
        className='bg-img lg:absolute top-0 left-0 lg:w-1/2 w-full h-full flex-shrink-0'
    >
        <Image
            src="/gateway1.webp"
            width={5000}
            height={5000}
            alt='img'
            className='w-full h-full object-cover'
        /> 
    </div>
};

export default SectionLeft;