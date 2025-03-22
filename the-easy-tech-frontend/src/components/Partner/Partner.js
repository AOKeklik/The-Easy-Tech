"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Link from 'next/link'
import Image from 'next/image'

const Partner = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='cta-block relative lg:h-[120px] h-[180px]'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateY(0px)" : "translateY(60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='bg-cta w-full h-full absolute top-0 left-0 z-[-1]'>
            <Image width={5000} height={5000} className='w-full h-full object-cover' src='/cta/bg-cta1.png' /> 
        </div>
        <div className='container flex items-center justify-between max-lg:flex-col max-lg:justify-center gap-6 h-full'>
            <div className='heading5 max-lg:text-center text-white'>Looking for a first-class business consultant?</div>
            <Link className='button-main rounded-full hover:bg-black hover:text-white bg-white text-button px-9 py-3' href='/'>Get A Contact</Link>
        </div>
    </div>
};

export default Partner;