"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'


const SectionText = () => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return <div 
        className='w-full lg:w-1/2 flex-col lg:pl-20'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX(-60px)",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='heading3'>Lorem ipsum dolor sit amet.</div>
        <div className='nav-infor mt-8'>
            <div className='title text-secondary mt-4'>
                Credit Card Management Use Wisely
                <div className='body2 text-secondary mt-4'>The jobs report soundly beat expectations, with job gains broadly spread across the economy and about The jobs report soundly beat expectations, with job gains broadly spread across the economy and about.</div> 
            </div> 
        </div>
    </div> 
};

export default SectionText;