"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Link from 'next/link'

const SectionLeft = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='w-full xl:w-5/12 flex flex-col gap-y-6'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX(-60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <h3 className='heading3'>Lorem ipsum dolor sit.</h3>
        <div className='body3 text-secondary'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, reiciendis ipsa. Reprehenderit tenetur officia temporibus!</div> 
        <div className='button-block'>
            <Link className='button-main bg-black hover:bg-black text-white bg-blue  rounded-full' href='/'>Get Started</Link>
        </div> 
    </div>
};

export default SectionLeft;