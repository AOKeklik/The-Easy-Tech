"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import Image from 'next/image'

const SectionImage = ({img,direction}) => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})
    const degree = direction === "right" ? "-60px" : "60px"

    return <div 
        className='w-full lg:w-1/2'
        ref={ref}
        style={{ 
            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
            transform:isInView ? "translateX(0px)" : "translateX("+degree+")",
            opacity:isInView ? 1 : 0,
        }}
    >
        <div className='bg-img w-full overflow-hidden rounded-3xl'>
            <Image src={img} width={4000} height={4000} alt={direction} className='w-full h-full block' /> 
        </div> 
    </div>
};

export default SectionImage